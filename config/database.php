<?php

class Database{
    //public static function connect($host="sql202.infinityfree.com",$user="if0_35807583",$pwd="VH1WQMBR6OMEaxW", $db="if0_35807583_tiendaropasql"){
        public static function connect($host="localhost",$user="root",$pwd="root", $db="tienda_ropa"){
        try{
            $con= new mysqli($host,$user,$pwd,$db);
        }catch(mysqli_sql_exception $e){
            die('Error en la base de datos');  
        }
        
        if($con == false){
          die('Error en la base de datos');
        }else{
            return $con;
        }
    }
}

?>