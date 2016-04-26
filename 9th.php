<?php include('top.php') ?>
	<body>
		<?php
			$dir    = '9th';
			$files = scandir($dir);

			unset($files[0]);
			unset($files[1]);

			$studentNames = array();

			foreach ($files as $file) {
				$fileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

				//Add First Character
				$pieces = explode("'", $fileName);
				$imploded = $pieces[0];

				for ($j = 1; $j < count($pieces); $j++) {
					if ($j % 2 == 0) {
						#second quote
						$imploded .= "' " . $pieces[$j];
					} else {
						#first quote
						$imploded .= " '" . $pieces[$j];
					}
				}

				$buildStr = substr($imploded, 0, 1);

				for( $i = 1; $i < strlen($imploded); $i++ ) {

						$prevChar = substr( $imploded, $i - 1, 1 );
					    $char = substr( $imploded, $i, 1 );
					    $nextChar = substr( $imploded, $i + 1, 1 );
						
						if (ctype_upper($char) && $prevChar != "-" && $prevChar != "'" && $prevChar != " ") {
					    	//Char is uppercase, add space before
					    	$buildStr .= " " . $char;
					    } else {
					    	$buildStr .= $char;
					    }
					}

				?>
					<div class="studentProfile gallery">
						<img class="studentImage" src="<?php echo '9th/' . $file;?>">
						<p class="studentName"><?php echo $buildStr;?></p>
						
					</div>
				<?php
			} // end for each file
		?>
	</body>
</html>
