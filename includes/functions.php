<?php

/* Format date into a prettier string*/
function formatDate($dateString) {
    // Check if the input date string is empty
    if (empty($dateString)) {
        return ''; // or handle the error as per your requirement
    }
    
    // Attempt to create a DateTime object from the input date string
    $date1 = DateTime::createFromFormat('m/d/Y', $dateString);
    
    // Check if the DateTime object was created successfully
    if ($date1 === false) {
        return ''; // or handle the error as per your requirement
    }
    
    // Format the DateTime object into a prettier string
    return $date1->format('F jS, Y');
}

/* Format date into YYYY-MM-DD format for use in opengraph meta tags */
function convertDateFormat($date2) {
    // Split the date into parts using "/"
    $dateParts = explode('/', $date2);
    
    // Rearrange the parts to form the YYYY-MM-DD format
    $formattedDate_OG = $dateParts[2] . '-' . str_pad($dateParts[0], 2, '0', STR_PAD_LEFT) . '-' . str_pad($dateParts[1], 2, '0', STR_PAD_LEFT);
    
    return $formattedDate_OG;
}

/* Example usage:

$dateString = '4/1/1900';
$formattedDate = formatDate($dateString);
echo $formattedDate; // Output: April 1st, 1900

You can also echo it directly like so:
echo formatDate($dateString);

*/

?>