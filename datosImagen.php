<?php
    //se declara variable de sesion
    session_start();

    if(isset($_POST['formulario1'])){

        //recibimos los datos de la imagen
        $imagenAsubir = $_FILES['imagen']['name']; //nombre imagen
        $imagenTipo = $_FILES['imagen']['type'];
        $imagenTamaño = $_FILES['imagen']['size'];

        if($imagenTipo != "image/jpeg"){

            //declaramos el error que mostraremos en la vista
            $_SESSION['errortype']="solo se permite formato .jpg";
            //redirecciona al index.php
            header("Location: index.php");
            die();

        } else {

            //ruta de la carpeta destino en el servidor
            $destinoCarpeta = 'tmp/';
            //movemos la imagen del directorio temporal al directorio escogido
            move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoCarpeta.$imagenAsubir);
            //declaramos el mensaje de exito que mostraremos en la vista
            $_SESSION['exito'] = "se subio con exito";
            $_SESSION['url'] = 'tmp/'. $imagenAsubir;

            //redirecciona al index.php
            header("Location: index.php");
            die();
            
        }    

    }

    if(isset($_POST['cambiar'])){
        
        if($_POST['opcion'] == 1){

            // el codigo para mover una imagen de una carpeta a otra y borra el archivo de la carpeta temporal
            $ubicacionActual = $_POST['ubicacion'];
            $nuevaubicacion = explode('/',$_POST['ubicacion']);
            $mover = rename($ubicacionActual, 'images/'.$nuevaubicacion[1]);
            
            if($mover){
                $_SESSION['exito2'] = "se movio con exito";
                header("Location: index.php");
                die();
            }
        }

        if($_POST['opcion'] == 2){

            // el codigo no se hizo ningun cambio
            $_SESSION['error2'] = "No se hizo nada";
            header("Location: index.php");
            die();

        }

    }
  

?>