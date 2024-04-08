<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#">
<head>
	<?php
		$currentURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if (!empty($_SERVER['QUERY_STRING'])) {
			$currentURL .= '?' . $_SERVER['QUERY_STRING'];
		}
	?>
	
	<base href="<?php echo 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . '/'; ?>">
	<?php 
		/* This HTML code snippet sets the base URL for all relative URLs within the document using the <base> element. Here's what each part of the PHP code within the href attribute does:

		<?php echo ... ?>: This PHP code snippet is used to dynamically generate the value for the href attribute of the <base> element.

		'http' . ...: This part concatenates the string 'http' with additional strings to construct the base URL.

		(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : ''): This is a ternary conditional operator (?:) that checks if the HTTPS protocol is being used. If $_SERVER['HTTPS'] is set and equals 'on', it appends the letter 's' to the string (for https://), otherwise it appends an empty string.

		'://' . $_SERVER['HTTP_HOST']: This part appends the :// separator and the value of $_SERVER['HTTP_HOST'], which represents the host name from the request headers.

		'/': This part appends a trailing slash to ensure that the base URL is properly formatted.

		In summary, this HTML code sets the base URL for all relative URLs within the document to either http:// or https:// depending on the current protocol (http or https), followed by the host name from the request headers ($_SERVER['HTTP_HOST']). */
	?>
	
	
	<?php
		// This function helps extract special values from a file based on a given pattern
		function extractValueFromPattern($filename, $pattern) {
			// Read the content of the Markdown file
			$markdownContent = file_get_contents("pages/" . $filename . ".md");
			// Check if the pattern matches any part of the content
			if (preg_match($pattern, $markdownContent, $matches)) {
				// If there's a match, return the extracted value (trimmed to remove any extra spaces)
				return trim($matches[1]);
			}
			// If no match is found, initialize the variable with an empty string. We do this so that the page doesn't die due to errors.
			return null;
		}

		// Define an array of patterns and their corresponding variable names
		$patterns = [
			'pagetitle' => '/<!--\s+pagetitle:(.*?)\s+-->/s',         // Pattern to extract page title
			'layout' => '/<!--\s+layout:(.*?)\s+-->/s',                // Pattern to extract layout
			'pagedate' => '/<!--\s+pagedate:(.*?)\s+-->/s',                // Pattern to extract date
			'pageimage' => '/<!--\s+pageimage:(.*?)\s+-->/s',      // Pattern to extract thumbnail
			'pageexcerpt' => '/<!--\s+pageexcerpt:(.*?)\s+-->/s',          // Pattern to extract excerpt
			'pagekeywords' => '/<!--\s+pagekeywords:(.*?)\s+-->/s',        // Pattern to extract keywords
			'pageauthor' => '/<!--\s+pageauthor:(.*?)\s+-->/s',            // Pattern to extract author
			'pagetype' => '/<!--\s+pagetype:(.*?)\s+-->/s',                // Pattern to extract page content type (E.G. website, article, blog, profile, video, music, book, product)
			
			/* Here is a nice copy pastable list of tags for posts and pages */
			/*
				<!-- pagetitle: -->
				<!-- layout: -->
				<!-- pagedate: -->
				<!-- pageimage: -->
				<!-- pageexcerpt: -->
				<!-- pagekeywords: -->
				<!-- pageauthor: -->
				<!-- pagetype: -->
			*/

			// You can add more patterns here as needed
		];

		// Loop through each pattern and extract its value
		foreach ($patterns as $variableName => $pattern) {
			// Use the extractValueFromPattern function to extract value based on each pattern
			// Store the extracted value in a variable with the name specified in $variableName
			${$variableName} = extractValueFromPattern($pagename, $pattern);
		}
	?>
	
	<!-- Basic Page Needs
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title><?php if (isset($pagetitle)) { echo ucwords($pagetitle); } else { echo ucwords($pagename); } ?> - <?php echo $WebsiteTitle; ?></title>
	<html lang="<?php echo $WebsiteLanguageCountry; ?>">
	<meta name="referrer" content="strict-origin">
	<link rel="canonical" href="<?php echo $currentURL; ?>">
	
	<?php /* Set a fallback page excerpt/description */ ?>
	<?php if ($pageexcerpt == "") { $pageexcerpt = $WebsiteDescription; }?>
	<meta name="description" content="<?php echo $pageexcerpt; ?>">
	
	<?php /* Set a fallback page author */ ?>
	<?php if ($pageauthor == "") { $pageauthor = $WebsiteAuthor; }?>
	<meta name="author" content="<?php echo $pageauthor; ?>">
	
	<?php /* Set a fallback page keywords */ ?>
	<?php if ($pagekeywords == "") { $pagekeywords = $WebsiteKeywords; }?>
	<meta name="keywords" content="<?php echo $pagekeywords; ?>">
	
	<meta name="robots" content="robots.txt">
	
	<?php /* Opengraph Garbage goes here */ ?>
	<meta property="og:title" content="<?php if (isset($pagetitle)) { echo ucwords($pagetitle); } else { echo ucwords($pagename); } ?> - <?php echo $WebsiteTitle; ?>">
	<meta property="og:description" content="<?php echo $pageexcerpt; ?>">
	<meta property="og:url" content="<?php echo $currentURL; ?>">
	
	<?php /* Set a default image */ ?>
	<?php if ($pageimage == "") { $pageimage = $WebsiteImage; } ?>
	<meta property="og:image" content="<?php echo $pageimage; ?>">
	
	<?php /* Set a default pagetype (E.G. website, article, blog, profile, video, music, book, product) */ ?>
	<?php if ($pagetype == "") { $pagetype = "website"; }?>
	<meta property="og:type" content="<?php echo $pagetype ?>">
	
	<meta property="og:site_name" content="<?php echo $WebsiteTitle; ?>">
	<meta property="og:locale" content="<?php echo $WebsiteLanguageLocale; ?>">
	
	<?php /* Convert date to YYYY-MM-DD*/ ?>
	<?php	
		if ($pagedate != "") {
			$outputDateFormat1 = formatDate($pagedate, 'Y-m-d H:i:s');
			$pagedate = $outputDateFormat1;
		} else {
			// Get the last modified time of the file
			$pagefilename = "pages/" . $pagename .".md";
			$lastModifiedTime = filemtime($pagefilename);
			$lastModifiedDate = date("Y-m-d H:i:s", $lastModifiedTime);
			$pagedate = $lastModifiedDate;
		}
	?>
	<meta property="og:article:published_time" content="<?php echo $pagedate; ?>">



	<!-- Mobile Specific Metas
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONT
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<?php /* Load the Font via CSS */ ?>

	<!-- CSS
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/responsivegridsystem.css">
	<link rel="stylesheet" href="themes/<?php echo $theme; ?>/navigation.css">
	<link rel="stylesheet" href="themes/<?php echo $theme; ?>/custom.css">

	<!-- Favicon
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	
	<div class="header">	
	<?php if ($pagename == "home") { ?>
		<div class="hero">
			<h1 class="herotext"><?php echo $WebsiteTitle; ?></h1>
		</div>
	<?php } else { ?>
		<div class="herosmall">
			<h1 class="herotext"><?php echo $WebsiteTitle; ?></h1>
		</div>
	<?php } ?>
	</div>
	
	<?php if(isset($_GET['meta'])) { ?>
	<div id="debug-overlay-container">
		<div class="debug-content">
			<strong>Metadata Information for "<?php echo $pagetitle; ?>"</strong></br>
			<strong>PageTitle:</strong> <?php echo $pagetitle; ?></br>
			<strong>Layout:</strong> <?php echo $layout; ?></br>
			<strong>Date:</strong> <?php echo $pagedate; ?></br>
			<strong>Thumbnail:</strong> <?php echo $pageimage; ?></br>
			<strong>Excerpt:</strong> <?php echo $pageexcerpt; ?></br>
			<strong>Keywords:</strong> <?php echo $pagekeywords; ?></br>
			<strong>Author:</strong> <?php echo $pageauthor; ?></br>
			<strong>Type:</strong> <?php echo $pagetype; ?></br>
			<strong>Website Title:</strong> <?php echo $WebsiteTitle; ?></br>
			<strong>Language/Country:</strong> <?php echo $WebsiteLanguageCountry; ?></br>
			<strong>Current URL:</strong> <?php echo $currentURL; ?></br>
			<strong>Language/Locale:</strong> <?php echo $WebsiteLanguageLocale; ?></br>
		</div>
	</div>	
	<?php } ?>
	
<?php if ($loadplugins == true) { include 'plugins/plugins.php'; } ?>
<?php include 'navigation.php'; ?>
<?php include $layout; ?>
<?php include 'footer.php'; ?>