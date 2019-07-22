<?php
  ini_set("display_errors", "1");
  include_once("PHPCSV.php");
  $csv = new PHPCSV();
  $csv->addLine("My File", "test");
  $csv->outputToFile();
  $csv->outputToPage(false);
?>
