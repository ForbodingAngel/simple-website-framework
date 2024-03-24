<?php
// File paths for footer content
$footerFiles = [
    "./pages/footer/footer1.md",
    "./pages/footer/footer2.md",
    "./pages/footer/footer3.md"
];

// Initialize arrays to store footer content and section titles
$footerContents = [];
$sectionTitles = [];

// Retrieve footer content and section titles from each file
foreach ($footerFiles as $index => $footerFile) {
    // Read the contents of the markdown file
    $markdownContent = file_get_contents($footerFile);
    
    // Define the pattern to extract the section title from the markdown content
    $pattern = '/<!-- sectiontitle:(.*?) -->/'; // Changed pattern from widgetsectiontitle to sectiontitle
    
    // Attempt to match the pattern in the markdown content
    if (preg_match($pattern, $markdownContent, $matches)) {
        // If a match is found, extract and store the section title
        $sectionTitles[$index] = trim($matches[1]);
    }
    
    // Store the entire markdown content in the array for later use
    $footerContents[$index] = $markdownContent;
}

// Output footer columns based on the number of columns
if ($numberFooterColumns == 1) {
    // If there is only one footer column, output it in full width
    echo '<div class="col span_12_of_12">';
    echo '<div class="footercolumn">';
    echo '<div class="footercolumn1">';
	echo '<span class="sectiontitle">' . $sectionTitles[0] . '</span>';
    echo from_markdown($footerContents[0]); // Output the footer content
    echo '</div>';
    echo '</div>';
    echo '</div>';
} elseif ($numberFooterColumns == 2 || $numberFooterColumns == 3) {
    // Determine the class for each column based on the number of columns
    $columnClass = ($numberFooterColumns == 2) ? '6_of_12' : '4_of_12';
    
    // Output each footer column
    foreach ($footerContents as $index => $footerContent) {
        $columnNumber = $index + 1;
		$sectionNumber = $index;
        // Start a column container with appropriate width class
        echo '<div class="col span_' . $columnClass . '">';
        echo '<div class="footercolumn">';
        echo '<div class="footercolumn' . $columnNumber . '">';
		echo '<span class="sectiontitle">' . $sectionTitles[$sectionNumber] . '</span>';
        echo from_markdown($footerContent); // Output the footer content
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// If you want to call a section title elsewhere:
// Use $sectionTitles[index] where index is the position of the title.
// For example, to access the second section title, you can use $sectionTitles[1].
?>
