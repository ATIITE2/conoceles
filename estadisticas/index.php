<!DOCTYPE html>
<html lang="es">

<?php
		define("TITULO", "Estadísticas Candidatas y Candidatos Conóceles");
		define("RUTA_SCRIPTS", "../");
		define("FUENTE_CSS", "estadisticas");
		include RUTA_SCRIPTS. "layout/head.php";
?>

<body>
	<?php 	include RUTA_SCRIPTS. "layout/header.php";
			include RUTA_SCRIPTS. "public/estadisticas.php";
			include RUTA_SCRIPTS. "layout/footer.php"; ?>
</body>

</html>