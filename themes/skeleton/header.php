<!DOCTYPE html>
<html lang="en">
<head>
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
			// If no match is found, return null
			return null;
		}

		// Define an array of patterns and their corresponding variable names
		$patterns = [
			'pagetitle' => '/<!-- pagetitle:(.*?) -->/',  // Pattern to extract page title
			'layout' => '/<!-- layout:(.*?) -->/',        // Pattern to extract layout
			'pagedate' => '/<!-- date:(.*?) -->/',        // Pattern to extract layout
			'pagethumbnail' => '/<!-- thumbnail:(.*?) -->/',        // Pattern to extract layout
			'pageexcerpt' => '/<!-- excerpt:(.*?) -->/',        // Pattern to extract layout
			'pageauthor' => '/<!-- author:(.*?) -->/',        // Pattern to extract layout
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
	<meta name="referrer" content="strict-origin">
	<meta name="description" content="">
	<meta name="author" content="">

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

<?php include 'includes/functions.php'; ?>
<?php if ($loadplugins == true) { include 'plugins/plugins.php'; } ?>
<?php include 'navigation.php'; ?>
<?php include $layout; ?>
<?php include 'footer.php'; ?>