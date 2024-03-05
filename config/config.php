<?php
	/*Leaving these for posterity... Parsedown has issues with php8+, so I had to implement a newer parser.*/	
	//include './required/parsedown/Parsedown.php';
	//include './required/parsedown/ParsedownExtra.php';
	
	/*New Markdown Parser*/
	require './required/PHP-Markdown-Parser/from.php';
	require './required/PHP-Markdown-Parser/to.php';
	
	$theme = "skeleton";
	$loadplugins = true;
?>