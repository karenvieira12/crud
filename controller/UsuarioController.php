<?php

$usuario = new Usuario();
$usuariodao = new UsuarioDAO();

$id =  filter_input_array(INPUT_POST);

if(insset($_POST['cadastrar'])){
    $usuario->setNome($d['nome']);
    $usuario->setSobrenome($d['sobrenome']);
    $usuario->setIdade($d['idade']);
    $usuario->setSexo($d['sexo']);

    $usuariodao->create($usuario);
}

else if (isset($_GET['del'])){
    $usuario->setId($_GET['del']);
    $usuariodao->delete($usuario);
}
