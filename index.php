<?php session_start();
    $tmp = null;
 if(isset($_SESSION['url'])){
    $tmp =  $_SESSION['url'];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-center mt-5 mb-5">
            <label class="form-label ">Imgenes</label>
            </div>
            <form class="row g-3" action="datosImagen.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="imagen" class="form-label">Subir Imagen</label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                </div>
                <div class="col-12">
                    <button type="submit" name = "formulario1" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <br>
            <?php if(isset($_SESSION['errortype'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php echo $_SESSION['errortype']; ?>
                </div>
            <?php } unset($_SESSION["errortype"]);?> 

            <?php if(isset($_SESSION['exito'])){ ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php echo $_SESSION['exito']; ?>
                </div>
                <br>
                <img class="img-fluid" src="<?php echo $_SESSION['url']; ?>" alt="">
                <br>
                <br>
                <?php echo 'el archivo se subio a la carpeta temporales, desea moverlo ?'; ?>
                <br>
                <br>
                <form class="row g-3" action="datosImagen.php" method="POST">
                    <select class="form-select" name = "opcion">
                        <option selected>select</option>
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                    <input type="hidden" name="ubicacion" value="<?php echo $tmp; ?>">
                    <button class="btn btn-primary" name = "cambiar" type="submit"> Enviar</button>
                </form>
            <?php } unset($_SESSION["exito"]);?> 

            <?php if(isset($_SESSION['exito2'])){ ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php echo $_SESSION['exito2']; ?>
                </div>
            <?php } unset($_SESSION["exito2"]);?> 

            <?php if(isset($_SESSION['error2'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php echo $_SESSION['error2']; ?>
                </div>
            <?php } unset($_SESSION["error2"]);?> 

        </div>
    </div>
</div>




</body>
</html>