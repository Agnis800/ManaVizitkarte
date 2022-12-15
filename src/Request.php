<?php
print_r($_GET);
print_r($_POST);
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
    print_r("POST");
} elseif ($method == 'GET'){
    print_r("GET");
} elseif ($method == 'PUT'){
    print_r("PUT");
} elseif ($method == 'DELETE'){
    print_r("DELETE");
} else {
    print_r('method unknown');
}

class Request {
    public $type1 = "get";
    public $type2 = "post";
    public function uri() {
      echo $_SERVER['REQUEST_URI'];
    }
}
?>