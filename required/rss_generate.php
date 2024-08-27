<?php
header('Content-Type: application/rss+xml; charset=UTF-8');

echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
echo "<rss version=\"2.0\">\n";
echo "<channel>\n";
echo "<title>Your Site Name - RSS Feed</title>\n";
echo "<link>https://www.yoursite.com/rss.xml</link>\n";
echo "<description>Latest articles from Your Site Name</description>\n";

// Output each article as an RSS item
foreach ($fileDetails as $fileDetail) {
    $title = htmlspecialchars($fileDetail['title'], ENT_XML1);
    $link = htmlspecialchars($fileDetail['currentURL'], ENT_XML1);
    $description = htmlspecialchars($fileDetail['excerpt'], ENT_XML1);
    $pubDate = date(DATE_RSS, strtotime($fileDetail['date']));

    echo "<item>\n";
    echo "<title>$title</title>\n";
    echo "<link>$link</link>\n";
    echo "<description><![CDATA[$description]]></description>\n";
    echo "<pubDate>$pubDate</pubDate>\n";
    echo "</item>\n";
}

echo "</channel>\n";
echo "</rss>\n";
?>