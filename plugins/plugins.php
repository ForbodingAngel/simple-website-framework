<?php /* Currently plugins have to be manually wired here. For toggling plugins on and off, look in the theme header.

Plugins are only loaded if loadplugins in config.php is set to true */ ?>


<?php /* CSS Before and After Slider */ ?>
<?php if ($beforeAndAfterSlider == true) { ?>
    <link type="text/css" href="plugins/css-before-and-after-image-slider/css/main.css" rel="stylesheet" />
    <script src="plugins/css-before-and-after-image-slider/js/jquery-3.6.0.min.js"></script>
    <script src="plugins/css-before-and-after-image-slider/js/main.js"></script>
<?php } ?>


<?php /* FontAwesome 4.7.0 */ ?>
<?php if ($fontAwesome == true) { ?>
    <link type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" />
<?php } ?>