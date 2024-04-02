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
		/* This looks for and html comment in your markdown file that defines the page title. The format is simply: <!-- pagetitle:My Page Title --> */
		$markdownContent_pagetitle = file_get_contents("pages/" . $pagename .".md"); 
		$pattern_pagetitle = '/<!-- pagetitle:(.*?) -->/';
		// Match the pattern in the Markdown content
		if (preg_match($pattern_pagetitle, $markdownContent_pagetitle, $matches_pagetitle)) {
			// Extract the layout file from the matched pattern
			$pagetitle = trim($matches_pagetitle[1]);
		}
	?>
	
	<?php 
		/* This looks for and html comment in your markdown file that defines what layout file to use. The format is simply: <!-- layout:page.php --> */
		$markdownContent_layout = file_get_contents("pages/" . $pagename .".md"); 
		$pattern_layout = '/<!-- layout:(.*?) -->/';
		// Match the pattern in the Markdown content
		if (preg_match($pattern_layout, $markdownContent_layout, $matches_layout)) {
			// Extract the layout file from the matched pattern
			$layout = trim($matches_layout[1]);
		}
	?>
	
	<?php 
		/* This looks for and html comment in your markdown file that defines the date. The format is simply: <!-- date:1/1/1900 --> */
		$markdownContent_date = file_get_contents("pages/" . $pagename .".md"); 
		$pattern_date = '/<!-- date:(.*?) -->/';
		// Match the pattern in the Markdown content
		if (preg_match($pattern_date, $markdownContent_date, $matches_date)) {
			// Extract the layout file from the matched pattern
			$pagedate = trim($matches_date[1]);
		}
	?>
	
	<?php 
		/* This looks for and html comment in your markdown file that defines who is the author. The format is simply: <!-- Author:John Doe --> */
		$markdownContent_author = file_get_contents("pages/" . $pagename .".md"); 
		$pattern_author = '/<!-- author:(.*?) -->/';
		// Match the pattern in the Markdown content
		if (preg_match($pattern_author, $markdownContent_author, $matches_author)) {
			// Extract the layout file from the matched pattern
			$pageauthor = trim($matches_author[1]);
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