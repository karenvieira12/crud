<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud PHP com MVC</title>
</head>
<body>
   <nav class="navbar navbar-light bg-light menu">
       <div class="container">
           <a class="navbar-brand" href="#">
               CRUD PHP
           </a>
        </div>
        <div class="container">
        <form>
            <label>Nome</label>
            <input type="text" name="nome" value="" class="form-control" require>
            <br>
            <label>Sobrenome</label>
            <input type="text" name="sobrenome" value="" class="form-control" require>
            <br>
            <label>Idade</label>
            <input type="number" name="idade" value="" class="form-control" require>
            <br>
            <label>Sexo</label>
            <select name="sexo" class="from-control">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        <div>
            <br>
            <button type="submit" class="btn btn-danger" name= "cadastrar">Cadastrar</button>
        </div>
       </div>
        </form>

    </nav>
</body>
</html>