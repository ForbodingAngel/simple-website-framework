<?php
	
	$WebsiteTitle = "Skeleton Website Framework";
	$WebsiteLanguageCountry = "en"; /* Use contry codes */
	$WebsiteLanguageLocale = "en_US"; /* Use Country Code plus locale */
	$WebsiteImage = "images/laptop-computer-writing-technology-web-internet.webp"; /* This image will be used as a default thumbnail any time the page image is not defined */
	$WebsiteDescription = "Creating websites shouldn't be a daunting task. With Skeleton Website Framework, simplicity and functionality merge seamlessly, offering you a hassle-free experience in website development."; /* Set a default description/excerpt for all pages */
	$WebsiteAuthor = "Scary le Poo"; /* Set a default page author */
	$WebsiteKeywords = "skeleton,framework,development,website,simplicity,security,ease,customize,flexibility"; /* Set default Keywords for site pages */
	
    /* Select a Theme */
	$theme = "skeleton";
	
	/* Display page name on home page? */
	$showhomepagetitle = true;

    /* Do we want any plugins? */
	$loadplugins = true;

    if ($loadplugins == true) {
        /* Choose what plugins you want to load here */
		
		/* SETTING THIS TO FALSE WILL BREAK ANYTHING THAT RELIES ON JQUERY */
		/* Do we want to load jQuery? The anser to this is almost always going to be yes. */
		$jQuery = true;
		
		/* SETTING THIS TO FALSE WILL BREAK SMOOTHSCROLL COMPLETELY */
		/* Add a class automatically to anchor links (Typically used for setting scroll-margin-top properties so that navigation bars don't cover the content */
		$anchorLinkAutoClass = true;
		
		/* SETTING THIS TO FALSE WILL BREAK ANCHOR LINKS COMPLETELY */
		/* Rewrite anchor link target urls so that they target the current url */
		/* This script will dynamically update all anchor links that start with "#" to include the base URL of the current page. This way, relative URLs will remain intact, and only the anchor links will be modified to include the current page's path. */
		$anchorLinkCurrentURLRewrite = true;
		
		/* If meta box is active, do we want to rewrite all urls so that we can stay in meta box mode? */
		$metaInfoBoxRewriteURL = true;
        
        /* Before and After Image Slider */
        $beforeAndAfterSlider = true;
            
        /* FontAwesome */
        $fontAwesome = false;
		
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