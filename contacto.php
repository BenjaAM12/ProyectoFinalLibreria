<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto - Librería</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <a class="nav-link active" href="contacto.php">Contacto</a>
      </div>
    </div>
  </div>
</nav>
</header>

<br>
<main>
    <div class="container py-4">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2>Formulario de contacto</h2>
          <form action="process_contact.php" method="post">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre completo</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="asunto" class="form-label">Asunto</label>
              <input type="text" class="form-control" id="asunto" name="asunto" required>
            </div>
            <div class="mb-3">
              <label for="comentario" class="form-label">Comentario</label>
              <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script>
  $(document).ready(function() {

    $('form').submit(function(event) {
      event.preventDefault();

      $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: $(this).serialize(),
        success: function(response) {
          Swal.fire({
            icon: 'success',
            title: '¡Tu mensaje ha sido enviado!',
            showConfirmButton: false,
            timer: 1500
          });
          $('form')[0].reset();
        },
        error: function(xhr, status, error) {
          console.error(error);
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ha ocurrido un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.'
          });
        }
      });
    });
  });
</script>
</body>
</html>
