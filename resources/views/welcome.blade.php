<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Hello, world!</title>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">SGP - Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="#">Cliente</a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa:" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>

            </div>

        </nav>

    </header>
    <!-- Fim Header -->

    <div class="container">
        <h1 class="mt-4">Clientes</h1>
        <p>Cadastro de novos Clientes</p>
        <div class="card shadow ">
            <div class="card-body">
                <h5 class="card-title">Novo Cliente</h5>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" id="telefone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="tel" class="form-control" id="whatsapp">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="estado">Cidade</label>
                            <input type="text" class="form-control" id="cidade">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
