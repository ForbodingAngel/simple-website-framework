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

					// Folder containing the Article files
					$postsFolder = 'posts';

					// Folder containing the images
					$imageFolder = 'pages/' . $postsFolder . '/images';

					// Array to store file details
					$fileDetails = array();

					// Loop through each file in the Article folder
					foreach (glob("pages/$postsFolder/*.md") as $file) {
						// Read the file contents
						$contents = file_get_contents($file);

						// Extract pagetitle, date, thumbnail, and excerpt from HTML comments
						preg_match('/<!--\s+pagetitle:(.*?)\s+-->/s', $contents, $titleMatch); //This will be the linktext
						preg_match('/<!--\s+date:(.*?)\s+-->/s', $contents, $dateMatch); //This needs to be mm/dd/yyyy format
						preg_match('/<!--\s+thumbnail:(.*?)\s+-->/s', $contents, $thumbnailMatch); //Image filename with extension
						preg_match('/<!--\s+excerpt:(.*?)\s+-->/s', $contents, $excerptMatch); //No real formatting here, just a blurb

						// If all details are found, add them to the array
						if ($titleMatch && $dateMatch && $thumbnailMatch && $excerptMatch) {
							$title = trim($titleMatch[1]);
							$date = trim($dateMatch[1]);
							$thumbnail = trim($thumbnailMatch[1]);
							$excerpt = trim($excerptMatch[1]);
							$fileDetails[] = array('title' => $title, 'date' => $date, 'thumbnail' => $thumbnail, 'excerpt' => $excerpt, 'filename' => $file);
						}
					}

					// Sort the array by date in descending order
					usort($fileDetails, function ($a, $b) {
						return strtotime($b['date']) - strtotime($a['date']);
					});

					// Pagination
					$itemsPerPage = 5;
					$page = isset($_GET['page']) ? $_GET['page'] : 1;
					$startIndex = ($page - 1) * $itemsPerPage;
					$fileDetailsPage = array_slice($fileDetails, $startIndex, $itemsPerPage);

					// Output the sorted list of links, images, and excerpts for the current page
					foreach ($fileDetailsPage as $fileDetail) {
						$dateFormatted = date('m/d/Y', strtotime($fileDetail['date']));
						echo '<a href="' . $postsFolder . '/' . basename($fileDetail['filename'], '.md') . '">' . $fileDetail['title'] . '</a> - ' . $dateFormatted . '<br>';
						$imagePath = $imageFolder . '/' . $fileDetail['thumbnail'];
						if (file_exists($imagePath)) {
							echo '<img src="' . $imagePath . '" alt="' . $fileDetail['title'] . '"><br>';
						} else {
							echo 'Thumbnail not found for ' . $fileDetail['title'] . '<br>';
							echo 'Imagepath: ' . $imagePath;
						}
						echo '<p>' . $fileDetail['excerpt'] . '</p><br>';
					}

					// Pagination links
					$totalPages = ceil(count($fileDetails) / $itemsPerPage);
					echo '<div>';
					for ($i = 1; $i <= $totalPages; $i++) {
						if ($i == $page) {
							echo "<span>$i</span> ";
						} else {
							echo "<a href='$pagename?page=$i'>$i</a> ";
						}
					}
					echo '</div>';

					?>
				</div>
			</div>
		</div>
	</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
