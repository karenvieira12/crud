<?php 
include_once "Conexao.php";
include_once "model/Usuario.php";
include_once "dao/UsuarioDAO.php";

//instanciar as classes
$usuario = new Usuario();
$usuariodao = new UsuarioDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud PHP com MVC</title>
    <style>
        .menu,
        thead{
            background-color: #bbb !important;
        }
        .row{
            padding: 10px;
        }
    </style>    
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                CRUD PHP
            </a>
        </div>
    </nav>
         <div class="container">
             <form action="/controller/UsuarioController.php" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <label>Nome</label>
                        <input type="text" name="nome" value="" autofocus  class="form-control" require/>
                    </div>
                    <div class="col-md-5">
                        <label>Sobrenome</label>
                        <input type="text" name="sobrenome" value="" class="form-control" require/>
                    </div>
                    <div class="col-md-2">
                        <label>Idade</label>
                        <input type="number" name="idade" value="" class="form-control" require/>
                    </div>
                    <div class="col-md-2">
                        <label>Sexo</label>
                        <select name="sexo" class="form-control">
                            <option value="M">Masculino</option>    
                            <option value="F">Feminino</option>    
                        </select>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Idade</th>
                            <th>Sexo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usuariodao->read() as $usuario) : ?>
                            <tr>
                                <td><?= $usuario->getId() ?></td>
                                <td><?= $usuario->getNome() ?></td>
                                <td><?= $usuario->getSobrenome() ?></td>
                                <td><?= $usuario->getSexo() ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $usuario->getId() ?>">
                                        Editar
                                    </button>
                                    <a href="/controller/UsuarioController.php?del=<?= $usuario->getId() ?>">
                                    <button class="btn btn-danger btn-sm" type="button">Excluir</button>    
                                    </a>
                                </td>
                            </tr>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="editar><?= $usuario->getId() ?>" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1" role="dialog">    
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <div class="modal-body">
                                    <form action="/controller/UsuarioController.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nome</label>
                                                <input type="text" name="nome" value="<?= $usuario->getNome() ?>" class="form-control" require/>
                                            </div>
                                            <div class="col-md-7">
                                                <label>Sobrenome</label>
                                                <input type="text" name="sobrenome" value="<?= $usuario->getSobrenome() ?>" class="form-control" require/>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Idade</label>
                                                <input type="number" name="idade" value="<?= $usuario->getIdade() ?>" class="form-control" require/>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Sexo</label>
                                                <select name="sexo" class="form-control">
                                                    <?php if($usuario->getSexo()=='F') : ?>
                                                    <option value="M">Masculino</option>    
                                                    <option value="F">Feminino</option> 
                                                    <?php else : ?>
                                                        <option value="M">Masculino</option>    
                                                        <option value="F">Feminino</option> 
                                                    <?php endif ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div>
                                                <br>
                                                <input type="hidden" name="id" value="<?= $usuario->getId() ?>"/>
                                                <button type="submit" class="btn btn-primary" name="editar">Cadastrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>