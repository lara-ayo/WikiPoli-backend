<?php

    
    namespace Helper;
    
    use Helper\Config as Config;

    class Database{

        public static function db_connect(){

            $all=Config::all_config();
            $con = mysqli_connect($all['DB_HOST'],$all['DB_USERNAME'],$all['DB_PASSWORD'],$all['DB_NAME']);

            if (mysqli_connect_errno())
            {
                throw new Exception("Database is not connected".mysqli_connect_error());
            }else{

                return $con;
            }
        }
    }
?>