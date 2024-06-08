<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>página de login</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .corpo-registro {
            width: 500px;
            margin: 0 auto;
            padding: 30px 0 0 0;
        }
        .botao-display{
            display: none;
        }
    </style>
    <script>
        $(document).ready(()=>{
            $('#inputConfirmaSenha').keyup(e=>{
                let txt = $(e.target).val()
                console.log(txt)
                console.log($('#inputSenha').val())
                if(txt == $('#inputSenha').val()){
                    $('#submitButton').removeClass('botao-display')
                    $(e.target).removeClass('is-invalid')
                    $(e.target).addClass('is-valid')
                }else{
                    $(e.target).addClass('is-invalid')
                }
            })
        })
    </script>
</head>
<header>
    @include('navbar')
</header>

<body>
    <div class="container">
        <div class="corpo-registro">
            <div class="card">
                <form action="/home/criar" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail">Nome usuário:</label>
                            <input type="text" name="nome" class="form-control" id="inputEmail"
                                placeholder="Digite o seu nome">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email:</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="Digite o seu email">
                        </div>
                        <div class="form-group">
                            <label for="inputSenha">Senha</label>
                            <input type="password" class="form-control" id="inputSenha" placeholder="Senha:">
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmaSenha">Confirmar senha</label>
                            <input type="password" name="password" class="form-control" id="inputConfirmaSenha"
                                placeholder="Confirmar Senha:">
                        </div>
                        <div>
                            <small><a href="/sign-in">Criar nova conta</a></small>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary botao-display" id="submitButton">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>