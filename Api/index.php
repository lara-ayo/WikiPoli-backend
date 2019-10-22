<?php
    require_once('../autoloader.php');
    
    use Helper\Database as DB;

    echo (DB::db_connect());

   
   
?>