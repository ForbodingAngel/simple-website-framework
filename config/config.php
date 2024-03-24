<?php
	
	$WebsiteTitle = "Skeleton Website Framework";
	
    /* Select a Theme */
	$theme = "skeleton";

    /* Do we want any plugins? */
	$loadplugins = true;

    if ($loadplugins == true) {
        /* Choose what plugins you want to load here */
		
		/* Do we want to load jQuery? The anser to this is almost always going to be yes. */
		$jQuery = true;
		
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
	
	/* How many columns in the footer? */
	/* The Footer files are md files in pages/footer. The names must be footer1.md - footer3.md. If you are wanting more than 3 columns in your footer, you will need to edit footercolumns.php in the includes folder. Alternatively, you can manually do whatever you like in the footer by editing the theme's footer file. I don't necessarily recommend this, because you can do basically anything by using the built in functionallity, but the whole idea behind this project is that you have complete control, so go nuts! :-) */
	
	$numberFooterColumns = 3;	
?>