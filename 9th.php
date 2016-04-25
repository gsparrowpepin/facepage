<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Facepage</title>
		<meta name="description" content="GSP">
		<meta name="author" content="Guillaume Sparrow-Pepin">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			$dir    = '/9th';
			$files1 = scandir($dir);
			$files2 = scandir($dir, 1);

			print_r($files1);
			print_r($files2);
		?>
	</body>
</html>
