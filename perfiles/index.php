<!DOCTYPE html>
<html lang="es">

<?php
		define("TITULO", "Perfiles sample");
		define("RUTA_SCRIPTS", "../");
		define("FUENTE_CSS", "perfiles");
		include RUTA_SCRIPTS. "layout/head.php";
?>

<body>
	<div id='root'>
		<?php 	include RUTA_SCRIPTS. "layout/header.php";
				include RUTA_SCRIPTS. "public/perfiles.php";
				include RUTA_SCRIPTS. "layout/footer.php"; ?>
	</div>
</body>

</html>