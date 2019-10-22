<?php


/* 

    This is the Config Class 
*/

    namespace Helper;

    class Config{
        
        protected static $config=[

            'DB_HOST'=>'localhost',
            'DB_USERNAME'=>'root',
            'DB_PASSWORD'=>'oladipo',
            'DB_NAME'=>'gateapp',
            'Jwt_secret'=>''
        ];


        public static function get_config($key){

            $config= self::$config;
            return $config[$key];
        }

        public static function all_config(){
            $config= self::$config;
            return $config;
        }

        
    }
?>