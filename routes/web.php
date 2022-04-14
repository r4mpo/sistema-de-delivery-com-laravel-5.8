<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* As rotas recebidas no formulário são enviadas para a web.php e processadas no controller (ProdutosController) */
Route::get('/', [ProdutosController::class, 'index']); /* Rota para a index. */
Route::get('/produtos/create', [ProdutosController::class, 'create'])->middleware('auth'); /* Rota para o cadastro de produtos. O parâmetro mostra que apenas users logados podem acessar */
Route::post('/produtos', [ProdutosController::class, 'store']); /* Rota para inserir dados no banco */
Route::get('/produtos/show/{id}', [ProdutosController::class, 'show']); /* Esta é a rota para exibir o próduto com mais detalhes, o show. Note que passamos o ID entre os parâmetros. */
Route::get('/dashboard', [ProdutosController::class, 'dashboard'])->middleware('auth');  /* Rota para a dashboard. O parâmetro mostra que apenas users logados podem acessar */
Route::get('/produtos/delete/{id}', [ProdutosController::class, 'delete'])->middleware('auth');  /* Rota para a exclusão de produtos. O parâmetro mostra que apenas users logados podem acessar */
Route::get('/produtos/edit/{id}', [ProdutosController::class, 'edit'])->middleware('auth');  /* Rota para a tela de edição de produtos. O parâmetro mostra que apenas users logados podem acessar */
Route::put('/produtos/update/{id}', [ProdutosController::class, 'update'])->middleware('auth'); /* Caminho para realizar o update no banco de dados. Para isso, usamos o method PUT. */
Route::get('/produtos/cart', [ProdutosController::class, 'cart'])->middleware('auth');  /* Rota para a dashboard. O parâmetro mostra que apenas users logados podem acessar */
Route::get('/produtos/addcart/{id}', [ProdutosController::class, 'addcart'])->middleware('auth');  /* Rota para a adicionar produtos ao carrinho */
Route::get('produtos/dltcart/{id}', [ProdutosController::class, 'dltcart'])->middleware('auth');