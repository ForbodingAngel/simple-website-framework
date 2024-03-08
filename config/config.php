<?php
	/*Leaving these for posterity... Parsedown has issues with php8+, so I had to implement a newer parser.*/	
	//include './required/parsedown/Parsedown.php';
	//include './required/parsedown/ParsedownExtra.php';
	
	/*New Markdown Parser*/
	require './required/PHP-Markdown-Parser/from.php';
	require './required/PHP-Markdown-Parser/to.php';
	
	/*
		<?php
			// BEGIN MARKDOWN PARSER //
			// You must have this code block in every file that you want to parse a markdown file //
			use function x\markdown\from as from_markdown;
			use function x\markdown\to as to_markdown;
			// END MARKDOWN PARSER //
		?>
	*/
	
	$theme = "skeleton";
	$loadplugins = true;
	

?>