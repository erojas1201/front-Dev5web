<?php include("../modelo/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dev5WEB</title>
</head>
<body>
    <?php
    $usuario=$_POST['username'];
    $password=$_POST['password'];

    $data= json_decode( file_get_contents("../front end/web_service_mvi"), true );

    for($i=0; $i< count($data); $i++){
        if($usuario==$data[$i]["username"] && $password==$data[$i]["password"]){
            $perfil=$data[$i]["perfil"];
            $nombre=$data[$i]["nombre"];
            $apellido=$data[$i]["apellido"];
            $dependencia=$data[$i]["dependencia"];
            $_SESSION['perfil']=$perfil;
            $_SESSION['nombre']=$nombre." ".$apellido;
            $_SESSION['sesion']=true;
            $_SESSION['dependencia']=$dependencia;
            header('Location: ../front end/sesion.html');
        }
    }?>

            <div class="card-body">
            <div class="alert alert-danger" role="alert">
                Nombre de usuario y contraseña incorrectos
            </div>
            <a class="btn btn-secondary" href="../front end/index.html">Regresar al inicio</a>
            </div>    
</body>
</html>