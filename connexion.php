<?php
    class Connexion{
        public static function  Connect(){
            //connexion developpement
            // define("server", "localhost");
            // define("db_name", "notes");
            // define("user", "root");
            // define("password", "");

            //remote database connexion
            define("server", "remotemysql.com");
            define("db_name", "ua3c5Qbxlw");
            define("user", "ua3c5Qbxlw");
            define("password", "NSm0y2ISLk");

            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            try{
                $connexion = new PDO("mysql:host=".server."; dbname=".db_name, user, password, $options);
                return $connexion;
            }
            catch(Exception $error){
                die("Connexion error: ".$error->getMessage());
            }
        }
    }

?>



