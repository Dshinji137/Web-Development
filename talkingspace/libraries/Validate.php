<?php
class Validate {

  //Check required fields
  public function isRequired($field_array) {
    foreach($field_array as $field) {
      if($_POST[''.$field.''] == '') {
        return false;
      }
    }
    return true;
  }

  // Check email
  public function isValidEmail($email) {
    if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
      return true;
    }
    else {
      return false;
    }
  }

  // Check password
  public function passwordMatch($pw1,$pw2) {
    if($pw1 == $pw2) {
      return true;
    }
    else {
      return false;
    }
    // return $pw1 == $pw2;
  }


}
 ?>
