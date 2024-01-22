<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seleccionar imagen con tamaño máximo</title>
</head>
<body>

  <form id="miFormulario" action="" method="post" enctype="multipart/form-data">
    <label for="file">Seleccionar imagen (máx. 700 KB):</label>
    <input type="file" id="file" name="file" accept="image/*" onchange="validarImagen()">
    <p id="mensajeError"></p>
    <button type="submit" name="submit">Enviar</button>
  </form>

  <script>
    function validarImagen() {
      var input = document.getElementById('file');
      var mensajeError = document.getElementById('mensajeError');
      var maxSize = 700 * 1024; // Tamaño máximo en bytes (700 KB)

      if (input.files.length > 0) {
        var fileSize = input.files[0].size;

        if (fileSize > maxSize) {
          mensajeError.innerHTML = 'La imagen seleccionada supera el tamaño máximo permitido (700 KB).';
          document.getElementById('submit').disabled = true; // Deshabilitar el botón de enviar
        } else {
          mensajeError.innerHTML = '';
          document.getElementById('submit').disabled = false; // Habilitar el botón de enviar
        }
      }
    }
  </script>
</body>
</html>