<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $email = $_POST['txtEmail'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, apellido = ?, email = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $email, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>