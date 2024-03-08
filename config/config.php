<?php
	/*Leaving these for posterity... Parsedown has issues with php8+, so I had to implement a newer parser.*/	
	//include './required/parsedown/Parsedown.php';
	//include './required/parsedown/ParsedownExtra.php';
	
	/*New Markdown Parser*/
	require './required/PHP-Markdown-Parser/from.php';
	require './required/PHP-Markdown-Parser/to.php';


    function from_markdown(...$v) {
        return x\markdown\from(...$v);
    }

    function to_markdown(...$v) {
        return x\markdown\to(...$v);
    }
	
	$theme = "skeleton";
	$loadplugins = true;

    /* This is a catchall, just in case. There is also another catchall in the page layout file, just in case this one doesn't do the trick. */
    if (!file_exists("pages/" . $pagename .".md")) { 
        $pagename = "404"; 
    }
?>