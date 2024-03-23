<?php
	
	$WebsiteTitle = "Skeleton Website Framework";

	/* Leaving these for posterity... Parsedown has issues with php8+, so I had to implement a newer parser. */	
	//include './required/parsedown/Parsedown.php';
	//include './required/parsedown/ParsedownExtra.php';
	
	/* New Markdown Parser - There is a proper readme in the PHP-Markdown-Parser folder */
	require './required/PHP-Markdown-Parser/from.php';
	require './required/PHP-Markdown-Parser/to.php';


    function from_markdown(...$v) {
        return x\markdown\from(...$v);
    }

    function to_markdown(...$v) {
        return x\markdown\to(...$v);
    }


    /* Select a Theme */
	$theme = "skeleton";

    /* Do we want any plugins? */
	$loadplugins = true;

    if ($loadplugins == true) {
        /* Choose what plugins you want to load here */
		
		/* Add a class automatically to anchor links (Typically used for setting scroll-margin-top properties so that navigation bars don't cover the content */
		$anchorLinkAutoClass = true;
        
        /* Before and After Image Slider */
        $beforeAndAfterSlider = true;
            
        /* FontAwesome */
        $fontAwesome = true;
		
		/* yBox (Lightbox) */
        $yBox = true;
    }

    /* This is a catchall, just in case. There is also another catchall in the page layout file, just in case this one doesn't do the trick. */
    if (!file_exists("pages/" . $pagename .".md")) { 
        $pagename = "404"; 
    }
?>