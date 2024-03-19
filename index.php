<?php
	// Parse the requested URL
	
	$requestUri = $_SERVER['REQUEST_URI']; /* This line retrieves the requested URI from the $_SERVER superglobal array. $_SERVER['REQUEST_URI'] contains the URI (Uniform Resource Identifier) that was requested by the client. */
	
	$requestedPage = trim(parse_url($requestUri, PHP_URL_PATH), '/'); /* This line parses the requested URI using the parse_url() function and extracts the path component using the PHP_URL_PATH constant. The trim() function is then used to remove any leading or trailing slashes from the path. */
	
	//echo $requestedPage; /* This line is commented out and is not executed. It appears to be for debugging purposes, possibly to echo/print the value of $requestedPage for testing. */

	/* This is a catchall, just in case. There is also another catchall in the page layout file, just in case this one doesn't do the trick. */
	if (!file_exists("pages/" . $requestedPage .".md")) { 
		$pagename = "404"; 
	}
	
	if ($requestedPage =="") { 
	/* This block of code determines the name of the requested page based on the value of $requestedPage. If $requestedPage is empty (i.e., the root URL is requested), the page name is set to "home". Otherwise, the page name is set to the value of $requestedPage. */
		$pagename = "home";
	} else {
		$pagename = strtolower($requestedPage);
	}
	
	/* In summary, this code retrieves the requested URI, extracts the path component, and determines the name of the requested page based on the path. If no specific page is requested (e.g., accessing the root URL), it sets the page name to "home". */
	
	
	include './config/config.php';
	include './themes/' . $theme . '/header.php';
?>