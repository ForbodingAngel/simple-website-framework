</head>
<body>

	<!-- Primary Page Layout
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="container">
		<div class="pagetitle">
		<?php if ($pagename != "home") { ?>
			<?php if (isset($pagetitle)) { ?>
				<h1><?php echo $pagetitle; ?></h1>
			<?php } else { ?>	
				<h1><?php echo ucwords($pagename); ?></h1>
			<?php } ?>
		<?php } ?>
		</div>
		<div class="content">
			<div class="section group">
				<div class="col span_12_of_12">
					<?php
						//echo $pagename;
						//echo '<br>';
						$filename = "./pages/" . $pagename . ".md";
						//echo $filename;
						$output = file_get_contents($filename);
						// $parsedown = new Parsedown;
						// $parsedown->setSafeMode(true); // Enable this line if you want to sanitize HTML input (HTML will not be rendered)
						// a$parsedown->setMarkupEscaped(true); // escape HTML in trusted input
						
						//echo $parsedown->text($output);
						echo from_markdown($output);
					?>
				</div>
			</div>
		</div>
	</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->