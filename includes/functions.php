<?php

/* Formate date and time into a prettier string*/
function formatDate($dateString) {
    $date = DateTime::createFromFormat('m/d/Y', $dateString);
    return $date->format('F jS, Y');
}

/* Example usage:

$dateString = '4/1/1900';
$formattedDate = formatDate($dateString);
echo $formattedDate; // Output: April 1st, 1900

You can also echo it directly like so:
echo formatDate($dateString);

*/

?>