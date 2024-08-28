<?php
include 'config/config.php';
// Set the content-type to XML
header("Content-Type: application/rss+xml; charset=UTF-8");

function extractValueFromPattern($filename, $pattern) {
    $markdownContent = file_get_contents("posts/" . $filename . ".md");
    if (preg_match($pattern, $markdownContent, $matches)) {
        return trim($matches[1]);
    }
    return null;
}

// Define patterns for the metadata you want to extract
$patterns = [
    'pagetitle' => '/<!--\s+pagetitle:(.*?)\s+-->/s',
    'pagedate' => '/<!--\s+pagedate:(.*?)\s+-->/s',
    'pageexcerpt' => '/<!--\s+pageexcerpt:(.*?)\s+-->/s',
    'pageimage' => '/<!--\s+pageimage:(.*?)\s+-->/s' // Image pattern
];

// Site information
$siteTitle = "Your Site Title";
$siteLink = "https://yoursite.com";
$siteDescription = "Your site description";

// Initialize the RSS feed
echo '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";
echo '<rss version="2.0">' . "\n";
echo '<channel>' . "\n";
echo '<title>' . $siteTitle . '</title>' . "\n";
echo '<link>' . $siteLink . '</link>' . "\n";
echo '<description>' . $siteDescription . '</description>' . "\n";
echo '<language>en-us</language>' . "\n";

// Channel-wide image
echo '<image>' . "\n";
echo '<url>https://yoursite.com/logo.png</url>' . "\n";
echo '<title>' . $siteTitle . '</title>' . "\n";
echo '<link>' . $siteLink . '</link>' . "\n";
echo '</image>' . "\n";

// Loop through each Markdown file in the posts directory
$postsDir = __DIR__ . '/posts';
foreach (new DirectoryIterator($postsDir) as $fileInfo) {
    if ($fileInfo->isDot() || $fileInfo->getExtension() !== 'md') continue;

    $filename = $fileInfo->getBasename('.md');
    $pageData = [];

    // Extract metadata using the patterns
    foreach ($patterns as $variableName => $pattern) {
        $pageData[$variableName] = extractValueFromPattern($filename, $pattern);
    }

    if (empty($pageData['pagetitle']) || empty($pageData['pagedate'])) continue;

    $url = $siteLink . '/posts/' . $filename . '.html';
    $pubDate = date(DATE_RSS, strtotime($pageData['pagedate']));
    $imageUrl = !empty($pageData['pageimage']) ? $siteLink . '/' . $pageData['pageimage'] : '';

    // Add the item to the RSS feed
    echo '<item>' . "\n";
    echo '<title>' . htmlspecialchars($pageData['pagetitle']) . '</title>' . "\n";
    echo '<link>' . htmlspecialchars($url) . '</link>' . "\n";
    echo '<description>' . htmlspecialchars($pageData['pageexcerpt']) . '</description>' . "\n";
    if ($imageUrl) {
        echo '<enclosure url="' . htmlspecialchars($imageUrl) . '" type="image/jpeg" />' . "\n";
    }
    echo '<pubDate>' . $pubDate . '</pubDate>' . "\n";
    echo '</item>' . "\n";
}

echo '</channel>' . "\n";
echo '</rss>' . "\n";
?>
