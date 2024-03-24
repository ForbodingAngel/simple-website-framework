<?php /* Currently plugins have to be manually wired here. For toggling plugins on and off, look in the theme header.

Plugins are only loaded if loadplugins in config.php is set to true 

A lot of js/jquery stuff requires the script and whatever else to be called at the end of the page. That's what $pluginCalledBelowContent is for. We can put whatever html is needed to be called at the bottom of the page and store it in $pluginCalledBelowContent and just concatenate with each plugin that needs it by simply doing:

$myPluginContent = 'HTML crap goes here';

And then concatenate it like so:

$pluginCalledBelowContent = $pluginCalledBelowContent . $myPluginContent

And we just concatenate as we go along.

*/ ?>

<?php /* Initialize the variable */ $pluginCalledBelowContent = ""; ?>

<?php /* Include jQuery 3.7.1 */ ?>
<?php if ($jQuery == true) { ?>
	<script src="includes/jquery-3.7.1.min.js"></script>
	<script src="includes/jquery-migrate-3.4.0.min.js"></script>
<?php } ?>

<?php /* Add a class automatically to anchor links (Typically used for setting scroll-margin-top properties so that navigation bars don't cover the content */ ?>
<?php if ($anchorLinkAutoClass == true) { ?>
	<?php $anchorLinkAutoClassContent = '
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Get all anchor links
			var anchorLinks = document.querySelectorAll("a");

			// Loop through each anchor link
			anchorLinks.forEach(function(link) {
				// Add your desired class to each anchor link
				link.classList.add("anchor-top-margin");
			});
		});
	</script>
	';
	$pluginCalledBelowContent = $pluginCalledBelowContent . $anchorLinkAutoClassContent;
	?>
<?php } ?>


<?php /* CSS Before and After Slider */ ?>
<?php if ($beforeAndAfterSlider == true) { ?>
	<?php $beforeAndAfterSliderContent = '
    <link type="text/css" href="plugins/css-before-and-after-image-slider/css/main.css" rel="stylesheet" />
    <script src="plugins/css-before-and-after-image-slider/js/main.js"></script>
	';
	$pluginCalledBelowContent = $pluginCalledBelowContent . $beforeAndAfterSliderContent;
	?>
<?php } ?>


<?php /* FontAwesome 4.7.0 */ ?>
<?php if ($fontAwesome == true) { ?>
    <link type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" />
<?php } ?>

<?php /* yBox 4.7.0 */ ?>
<?php if ($yBox == true) { ?>
	<?php $yBoxScriptContent = '
	<link rel="stylesheet" href="plugins/yBox-main/dist/css/ybox.min.css" />
	<script type="text/javascript" src="plugins/yBox-main/dist/js/ybox.min.js?lang=he"></script>
	';
	$pluginCalledBelowContent = $pluginCalledBelowContent . $yBoxScriptContent;
	?>
<?php } ?>