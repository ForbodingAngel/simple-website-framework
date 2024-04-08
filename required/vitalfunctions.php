<?php
	// Enable Gzip compression for HTML output
	if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) { // Check if the client supports Gzip compression
		ob_start("ob_gzhandler"); // Start output buffering with Gzip compression handler
	} else {
		ob_start(); // Start regular output buffering
	}
?>

<?php
	$currentURL = 'http://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?'); // Get the URL without the query string

	if (!empty($_SERVER['QUERY_STRING'])) {
		parse_str($_SERVER['QUERY_STRING'], $queryParams); // Parse query string into array
		unset($queryParams['meta']); // Remove specific query parameter 'meta'
		$query = http_build_query($queryParams); // Rebuild the query string without 'meta' parameter
		if ($query) {
			$currentURL .= '?' . $query; // Append the modified query string
		}
	}
?>

<?php
	// This function helps extract special values from a file based on a given pattern
	function extractValueFromPattern($filename, $pattern) {
		// Read the content of the Markdown file
		$markdownContent = file_get_contents("pages/" . $filename . ".md");
		// Check if the pattern matches any part of the content
		if (preg_match($pattern, $markdownContent, $matches)) {
			// If there's a match, return the extracted value (trimmed to remove any extra spaces)
			return trim($matches[1]);
		}
		// If no match is found, initialize the variable with an empty string. We do this so that the page doesn't die due to errors.
		return null;
	}

	// Define an array of patterns and their corresponding variable names
	$patterns = [
		'pagetitle' => '/<!--\s+pagetitle:(.*?)\s+-->/s',         // Pattern to extract page title
		'pagelayout' => '/<!--\s+pagelayout:(.*?)\s+-->/s',                // Pattern to extract layout
		'pagedate' => '/<!--\s+pagedate:(.*?)\s+-->/s',                // Pattern to extract date
		'pageimage' => '/<!--\s+pageimage:(.*?)\s+-->/s',      // Pattern to extract thumbnail
		'pageexcerpt' => '/<!--\s+pageexcerpt:(.*?)\s+-->/s',          // Pattern to extract excerpt
		'pagekeywords' => '/<!--\s+pagekeywords:(.*?)\s+-->/s',        // Pattern to extract keywords
		'pageauthor' => '/<!--\s+pageauthor:(.*?)\s+-->/s',            // Pattern to extract author
		'pagetype' => '/<!--\s+pagetype:(.*?)\s+-->/s',                // Pattern to extract page content type (E.G. website, article, blog, profile, video, music, book, product)
		
		/* Here is a nice copy pastable list of tags for posts and pages */
		/*
			<!-- pagetitle: -->
			<!-- pagelayout: -->
			<!-- pagedate: -->
			<!-- pageimage: -->
			<!-- pageexcerpt: -->
			<!-- pagekeywords: -->
			<!-- pageauthor: -->
			<!-- pagetype: -->
		*/

		// You can add more patterns here as needed
	];

	// Loop through each pattern and extract its value
	foreach ($patterns as $variableName => $pattern) {
		// Use the extractValueFromPattern function to extract value based on each pattern
		// Store the extracted value in a variable with the name specified in $variableName
		${$variableName} = extractValueFromPattern($pagename, $pattern);
	}
?>