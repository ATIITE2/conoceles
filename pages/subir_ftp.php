<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivo con FTP</title>
</head>
<body>
    <h1>Subir Archivo con FTP</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Selecciona un archivo:</label>
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" value="Subir archivo">
    </form>
</body>
</html>