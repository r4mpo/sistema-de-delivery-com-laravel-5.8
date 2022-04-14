<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: rgb(59, 0, 47);">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><ion-icon name="home-outline" style="color: white;"></ion-icon></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                        @php
                        $user = Auth::user();
                        @endphp
                        @if($user['id'] == 1)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/produtos/create" style="color: white; border-color: white;"><ion-icon name="add-outline"></ion-icon> Novo Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"aria-current="page" href="/dashboard" style="color: white;"><ion-icon name="server-outline"></ion-icon> Estoque e Pedidos</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/produtos/cart" style="color: white; border-color: white;"><ion-icon name="cart-outline"></ion-icon> Carrinho</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a class="nav-link" href="/logout" style="color: white;" onclick="event.preventDefault();this.closest('form').submit();"><ion-icon name="log-out-outline"></ion-icon> Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/register" style="color: white;"><ion-icon name="create-outline"></ion-icon> Cadastrar-se</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"aria-current="page" href="/login" style="color: white;"><ion-icon name="enter-outline"></ion-icon> Entrar</a>
                        </li>
                        @endguest
                    </ul>
                    <form class="d-flex" action="/" method="GET">
                        <input class="form-control me-2" type="search" name="search" id="search" placeholder="Busque por produtos" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div id="content">
    @yield('content')
    </div>
    <footer>
        <div class="footer">
            <h3>PHP E-COMMERCE 2022 &copy; | Todos os direitos reservados | Desenvolvido por @r4mpo</h3>
        </div>
    </footer>
</body>
</html>