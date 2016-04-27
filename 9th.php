<?php include('top.php') ?>
		<section class="gallery">
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
					<!-- Make id lowercase for searchability -->
						<a class="studentLinkBox" id="<?php echo strtolower($fileName); ?>" href="<?php echo $dir . '/' . $file; ?>" data-lightbox="gallery" data-title="<?php echo $buildStr;?>">
							<div class="studentProfile" id="<?php echo $fileName; ?>">
								<img class="studentImage" src="<?php echo $dir . '/' . $file; ?>">
								<p class="studentName"><?php echo $buildStr;?></p>
							</div>
						</a>
						<!-- <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a> -->
					<?php
				} // end for each file
			?>
			<script src="src/js/lightbox-plus-jquery.min.js"></script>
			<script>
				//Lightbox
				lightbox.option({
			      'resizeDuration': 200,
			      'wrapAround': true,
			      'fadeDuration' : 0,
			      'maxWidth' : 600,
			      'maxHeight' : 600
			    });

				$( document ).ready(function() {
					//Search
					$( "input" ).keyup(function() {
				    	var value = $( this ).val().toLowerCase();
				    	if (value != "") {
				    		$(".studentLinkBox").hide();
				    		$('.studentLinkBox[id*=' + value + ']').each(function() {
							    $(this).show();
							});
				    	} else {
				    		$(".studentLinkBox").show();
				    	}

					}).keyup();
				});

				
			</script>
		</section>
	</body>
</html>
