<?php
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtEmail"])){
        header('Location: index.php?mensaje=falta'); //mensaje error 
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $email = $_POST["txtEmail"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,apellido,email) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$email]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado'); //registro realizado alert
    } else {
        header('Location: index.php?mensaje=error'); //registro no realizado alert
        exit();
    }
    
?>