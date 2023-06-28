<?php
    namespace App;
    abstract class credentials{
        use system;
        private $host = "127.0.0.1";
        private $dbname = "conjunto_residencial";
        protected $username = "root";
        private $password = "123456";
        function __construct(){
           
        }
    }

?>