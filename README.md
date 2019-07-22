# PHPCSV
A Simple PHP Library to export to a CSV file.

## Documentation

### Getting Started
First off download the contents of the "src" folder. Next append the following code to your php file.
``
  include_once("PHPCSV.php");
  $csv = new PHPCSV();
``


### Adding Lines to the file
Adding lines to the CSV file is easy, call the following code to append lines to the file.
``
  $csv->addLine("My String", 123);
``
You can have as many arguments to the function as you wish, each argument is separated by a comma in the file.
__You cannot output without adding at least 1 line.__

### Output onto the page
To output the CSV to the page call the following -
``
  $FileName="My File";//Sets the file name when downloaded.
  $ForceUserToDownload = true;//Forces download to the user's PC
  $csv->outputToPage($ForceUserToDownload, $FileName);
``

### Output to a file
To output the CSV to a file call the following -
``
  $FileName="My File";//Sets the file
  $FilePath = "/path/to/file/";//Path to save the CSV file to
  $csv->outputToFile($FilePath, $FileName);
``
This will create a CSV file to the specified path.
