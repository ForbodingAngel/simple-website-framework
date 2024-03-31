</head>
<body>

	<!-- Primary Page Layout
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="container">
		<div class="pagetitle">
		<?php if ($pagename != "home") { ?>
			<?php if (isset($pagetitle)) { ?>
				<h1><?php echo $pagetitle; ?></h1>
				<?php if (isset ($pagedate)) { echo "<p class=\"pagedate\">" . formatDate($pagedate) . "</p>"; } ?>
				<?php if (isset ($pageauthor)) { echo "<p class=\"pageauthor\">" . $pageauthor . "</p>"; } ?>
			<?php } else { ?>	
				<h1><?php echo ucwords($pagename); ?></h1>
			<?php } ?>
		<?php } ?>
		</div>
		<div class="content">
			<div class="section group">
					<?php
						$filename = "./pages/" . $pagename . ".md";
						$output = file_get_contents($filename);
						echo from_markdown($output);
					?>
			</div>
		</div>
	</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->