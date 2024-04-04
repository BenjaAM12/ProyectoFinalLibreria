<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Libros</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="fixed-top">  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-bottom">  <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Librería</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="index.php">Libros</a>
            <a class="nav-link" href="autores.php">Autores</a>
            <a class="nav-link" href="contacto.php">Contacto</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <br>
  <div class="banner-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="imagen1.jpg" class="py-3 w-100 alt="...">
        </div>
      </div>
    </div>
  </div>
  <br>
  <main>
    <div class="container">
      <div class="row"> 
         <?php
        $servidor = "sql105.infinityfree.com";
        $usuario = "if0_36299517";
        $password = "qKmYgYrnF3cuAM";

        try {
          $conexion = new PDO("mysql:host=$servidor;dbname=if0_36299517_db_libreria", $usuario, $password);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Consulta para obtener los libros
          $consulta = "SELECT * FROM titulos";
          $resultado = $conexion->query($consulta);

          // Mostrar los resultados
          echo '<div class="grid-container">';
          while ($libro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="grid-item p-3 border rounded-lg text-center">
                      <h5 class="card-title">'.$libro['titulo'].'</h5>
                      <p class="card-text">'.$libro['notas'].'</p>
                      <div class="d-flex justify-content-center">
                        <p class="card-text rounded-pill bg-success text-white px-2 py-1 mb-0">$'.$libro['precio'].'</p>
                      </div>
                    </div>';
          }
          echo '</div>';

        } catch (PDOException $e) {
          echo "conexion fallida: " . $e->getMessage();
        }
        $conexion = null;
        ?>
      </div>
    </div>
  </main>
</body>
</html>
