--TEST--
File_SearchReplace multiple files argument as array
--SKIPIF--
<?php 
include('./setup.php');
print $status; 
?>
--FILE--
<?php 
require_once('./setup.php');

$search  = "Copyright (c) 2002-2003";
$replace = "Copyright (c) 2002-2005";

$snr = new File_SearchReplace( $search, $replace, $files);
$snr -> doSearch() ;

foreach($files as $f) {
   readfile($f);
};

echo "\n------[Occurences]: " . $snr->occurences;
echo "\n------[Last Error]: " , ($snr->last_error !== '') ? var_dump($snr->last_error) : "N/A";

?>
--EXPECT--
<?php
// +-----------------------------------------------------------------------+
// | Copyright (c) 2002-2005, Richard Heyes                                |
// | All rights reserved.                                                  |
// |                                                                       |/**
// +-----------------------------------------------------------------------+
// | Copyright (c) 2002-2005, Richard Heyes                                |
 ...
 *
 * Search and Replace Utility
 *
 * @version 1.0
 * @package File
 */
------[Occurences]: 2
------[Last Error]: N/A