<?php
include_once "../Conexao.php";
include_once "../model/Usuario.php";
include_once "../dao/UsuarioDAO.php";

$usuario = new Usuario();
$usuariodao = new UsuarioDAO();

$id =  filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    $usuario->setNome($d['nome']);
    $usuario->setSobrenome($d['sobrenome']);
    $usuario->setIdade($d['idade']);
    $usuario->setSexo($d['sexo']);

    $usuariodao->create($usuario);

    header("Location: ../../");
}

else if(isset($_POST['editar'])){

    $usuario->setNome($d['nome']);
    $usuario->setSobrenome($d['sobrenome']);
    $usuario->setIdade($d['idade']);
    $usuario->setSexo($d['sexo']);
    $usuario->setId($d['id']);

    $usuariodao->update($usuario);

    header("Location: ../../");

}

else if (isset($_GET['del'])){
    $usuario->setId($_GET['del']);
    $usuariodao->delete($usuario);

    header("Location: ../../");
}else{
    header("Location: ../../");
}
