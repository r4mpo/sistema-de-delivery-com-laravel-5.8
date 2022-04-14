<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto; /* Devemos utilizar o model de conexão com o banco de dados. */
use App\Models\carrinho; /* Devemos utilizar o model de conexão com o banco de dados. */
use App\Models\User; /* Devemos utilizar o model de conexão com o banco de dados. */
use Illuminate\Support\Facades\Auth;
class ProdutosController extends Controller
{
    /* Função para corresponder à rota de ida para a index. */
    /* Além do retorno, também criamos a lógica da barra de pesquisa. */
    public function index(){
        $search = request('search');
        if($search){
            $produto = Produto::where([
                ['nome','like','%'.$search.'%']
            ])->get();
        }else{
            $produto = Produto::all();
        }
        return view('welcome', ['produto' => $produto, 'search' => $search]);
    }
    /* Função para corresponder à rota de ida para cadastros de produtos. */
    public function create(){
        $user = Auth::user();
        if($user['id'] == 1):    
        return view('produtos.create');
        else:
            return redirect('/')->with('msg', 'Sua conta não está habilitada a cadastrar produtos.');
        endif;
    }
    /* A seguir, temos o create. */
    public function store(Request $request){
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->qtd = $request->qtd;
        $produto->descricao = $request->descricao;
        if($request->hasFile('image') && $request->file('image')->isValid()){ /* Salvando a imagem */
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $request->image->move(public_path('img/produtos'), $imageName);
            $produto->image = $imageName;
        }
        if(!empty($produto->nome) && !empty($produto->preco) && !empty($produto->qtd) && !empty($produto->descricao) && !empty($produto->image)):
            $produto->save();
            return redirect('/')->with('msg', 'Parabéns! Produto cadastrado com sucesso!');
        else:
            return redirect('/')->with('msg', 'Erro! Todos os campos devem ser preenchidos!');
        endif;
    }
    /* Criando método para exibir dados no show */
    public function show($id){
        $produto = Produto::findOrFail($id);
        $user = auth()->user();
        
        /* Abaixo, existe um sistema para verificar se o produto já está no carrinho */
        $Cart = false;
        if($user){
            $userProdutos = $user->ProdutosNoCarrinho->toArray();
            foreach($userProdutos as $userProduto){
                if($userProduto['id'] == $id){
                    $Cart = true;
                }
            }
        }
        return view('produtos.show', ['produto' => $produto, 'user' => $user, 'Cart' => $Cart]);
    }
    /* Função para a dashboard */
    public function dashboard(){
        $user = Auth::user();
        if($user['id'] == 1):
            $produto = Produto::all();
            return view('produtos.dashboard', ['produto' => $produto]);
        else:
            return redirect('/');
        endif;
    }
    /* Função para excluir dados */
    public function delete($id){
        Produto::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Parabéns! Produto excluído com sucesso!');
    }
    /* Com o método acima, basicamente usamos a função "delete" no dado com o id passado. */
    /* A seguir, criaremos o método para exibir os dados no formulário de edição */
    public function edit($id){
        $user = Auth::user();
        if($user['id'] == 1):            
            $produto = Produto::findOrFail($id);
            return view('produtos.edit', ['produto' => $produto]);
        else:
            return redirect('/')->with('msg', 'Sua conta não está habilitada a realizar edições nos produtos.');
        endif;
    }
    /* Function para fazer o update no bd, através do formulário */
    public function update(Request $request){
        $dados = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $request->image->move(public_path('img/produtos'), $imageName);
            $dados['image'] = $imageName;
        }
        Produto::findOrFail($request->id)->update($dados);
        return redirect('/dashboard')->with('msg', 'Parabéns! Produto editado com sucesso!');
    }
    public function cart(){
        $user = auth()->user();
        $ProdutosNoCarrinho = $user->ProdutosNoCarrinho;
        return view('produtos.cart', ['ProdutosNoCarrinho' => $ProdutosNoCarrinho]);
    }
    public function addcart($id){
        $user = Auth()->user();
        $user->ProdutosNoCarrinho()->attach($id);
        return redirect('/')->with('msg', 'Parabéns! Produto adicionado ao carrinho!');
    }

    public function dltcart($id){
        $user = Auth()->user();
        $user->ProdutosNoCarrinho()->detach($id);
        return redirect('/')->with('msg', 'Parabéns! Produto removido do carrinho!');
    }
}