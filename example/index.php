<?php
  include_once("PHPCSV.php");
  $csv = new PHPCSV();
  $csv->outputToPage(true, "My File");
?>
