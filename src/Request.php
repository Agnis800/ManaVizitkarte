<?php

namespace App;

class Request {
    public $type1 = "get";
    public $type2 = "post";
    public function uri() {
      echo $_SERVER['REQUEST_URI'];
    }
    public function getMethod() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST'){
            return "POST";
        } elseif ($method == 'GET'){
            return "GET";
        } elseif ($method == 'PUT'){
            return "PUT";
        } elseif ($method == 'DELETE'){
            return "DELETE";
        } else {
            die('method unknown');
        }
    }
}
?>