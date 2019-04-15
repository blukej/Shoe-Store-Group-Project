<?php class Model {

public static function isIdValid($id) {
  return is_int($id) && ($id >= 1);
}

} ?>