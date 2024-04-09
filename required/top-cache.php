<?php
$url = $_SERVER["REQUEST_URI"];
$break = explode('/', $url);
$file = $break[count($break) - 1];

// Check if $file contains a file extension
if (strpos($file, '.') !== false) {
    $cachefile = 'cached-' . substr_replace($file, "", -4) . '.html';
} else {
    $cachefile = 'cached-' . $file . '.html';
}

$cachetime = 18000;
?>
<!-- This is a cached version! -->
<?php
// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
	echo "<!-- The URI for this page is: ".$_SERVER["REQUEST_URI"]." -->\n";
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    readfile($cachefile);
    exit;
}
ob_start(); // Start the output buffer
?>