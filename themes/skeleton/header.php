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
	
	
	<!-- Basic Page Needs
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title><?php echo ucwords($pagename); ?> - My Skeleton Website</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONT
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<? /* Load the Font via CSS */ ?>

	<!-- CSS
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/responsivegridsystem.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="themes/<?php echo $theme; ?>/navigation.css">
	<link rel="stylesheet" href="themes/<?php echo $theme; ?>/custom.css">

	<!-- Favicon
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	
	<div class="header">	
	<?php if ($pagename == "home") { ?>
		<div class="hero">
			<h1 class="herotext">Glendora Window and Screen</h1>
		</div>
	<?php } else { ?>
		<div class="herosmall">
			<h1 class="herotext">Glendora Window and Screen</h1>
		</div>
	<?php } ?>
	</div>
	
	<?php
		/* This looks for and html comment in your markdown file that defines what layout file to use. The format is simply: <!-- pagetitle:My Page Title --> */
		$markdownContent_pagetitle = file_get_contents("pages/" . $pagename .".md"); 
		$pattern_pagetitle = '/<!-- pagetitle:(.*?) -->/';
		// Match the pattern in the Markdown content
		if (preg_match($pattern_pagetitle, $markdownContent_pagetitle, $matches_pagetitle)) {
			// Extract the layout file from the matched pattern
			$pagetitle = trim($matches_pagetitle[1]);
		}
	?>
	
	<?php 
		/* This is a catchall, just in case. There is also another catchall in the page layout file, just in case this one doesn't do the trick. */
		if (!file_exists("pages/" . $pagename .".md")) { 
			$pagename = "404"; 
		}
		/* This looks for and html comment in your markdown file that defines what layout file to use. The format is simply: <!-- layout:page.php --> */
		$markdownContent_layout = file_get_contents("pages/" . $pagename .".md"); 
		$pattern_layout = '/<!-- layout:(.*?) -->/';
		// Match the pattern in the Markdown content
		if (preg_match($pattern_layout, $markdownContent_layout, $matches_layout)) {
			// Extract the layout file from the matched pattern
			$layout = trim($matches_layout[1]);
		}
	?>

<?php if ($loadplugins == true) { include './plugins/plugins.php'; } ?>
<?php include 'navigation.php' ?>
<?php include $layout; ?>
<?php include 'footer.php' ?>