</head>
<body>

	<!-- Primary Page Layout
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="container">
		<div class="pagetitle">
		<?php if ($pagename != "home") { ?>
			<h1><?php echo ucwords($pagename); ?></h1>
		<?php } ?>
		</div>
		<div class="row">
			<div class="one-half column">
				<?php
					$filename = "pages/" . $pagename . ".md";
					$output = file_get_contents($filename);
					$parsedown = new Parsedown;
					// $parsedown->setSafeMode(true); // Enable this line if you want to sanitize input (HTML will not be rendered

					echo $parsedown->text($output);
				?>
			</div>
		</div>
	</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>