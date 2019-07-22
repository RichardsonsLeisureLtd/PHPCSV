<?php
class PHPCSV{

  public $output = "";
  protected $header = "text/csv";
  protected $ext=".csv";


  public function outputToPage($forceDL=true, $file_name="My CSV File"){//Output CSV File to Page
    if($output != ""){
      if($forceDL){//If Forcing Download of file
        header("Content-type: ".$this->header);//Set to CSV Header
        header("Content-Disposition: attachment; filename=".$file_name.$this->ext);
        header("Pragma: no-cache");
        header("Expires: 0");
      }else{
        header("Content-type: text/plain");//Set to CSV Header
      }
      echo $this->output;//Output the CSV Data
      exit;
    }else{
      $this->printError("There is nothing to write to the file.");
    }
  }
  public function outputToFile($path="", $file_name="My CSV File"){
    if($this->output != ""){


        if(!$file = fopen($path.$file_name.$this->ext, "a")){
          $this->printError("Failed to open the file ".$file_name);
        }

        if(fwrite($file, $this->output) === FALSE){
          $this->printError("Failed to write to the file ".$file_name);
        }

        fclose($file);


    }else{
      $this->printError("There is nothing to write to the file.");
    }

  }
  public function addLine(){
    $args_count = func_num_args();
    if($args_count > 0){
      $args = func_get_args();
      $tmp_out = $this->output;

      for($i=0;$i<$args_count;$i++){
        if($i==0){
          $tmp_out.=$args[$i];
        }else{
            $tmp_out.=",".$args[$i];
        }
      }

      $tmp_out.="\n";

      $this->output=$tmp_out;
    }else{
      $this->printError("Failed to add line, nothing to add.");
    }
  }
  private function printError($error = "Error with no explaination occured"){
    header("Content-type: text/plain");//Set to TEXT Header
    echo "[PHPCSV][ERROR] ".date("Y-m-d H:i")." ".$error."\n";
    exit;
  }
}

?>
