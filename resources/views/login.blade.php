<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>página de login</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <style>
        .corpo-registro {
            width: 500px;
            margin: 0 auto;
            padding: 30px 0 0 0;
        }
    </style>
</head>

<body>
    <header>
        @include('navbar')
    </header>
    <div class="container">
        <div class="corpo-registro">
            <div class="card">
                <form action="/home/verificar" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail">Email:</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputSenha">Password</label>
                            <input type="password" name="password" class="form-control" id="inputSenha"
                                placeholder="Password">
                        </div>
                        <div>
                            <small><a href="/sign-in">Criar nova conta</a></small>
                        </div>
                        @if (session('status') === 'erro')
                            <small class="text-danger">
                                email ou senha inválidos
                            </small>
                        @endif
                        @if (session('status') === 'naoAutorizado')
                            <small class="text-danger">
                                você não pode acessar está página 
                            </small>
                        @endif
                        @if (session('status') === 'contaExiste')
                            <small class="primary">
                                esse email já está registrado, faça o login 
                            </small>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>