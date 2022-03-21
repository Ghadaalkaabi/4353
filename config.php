<?php
	try{
        if ($db = new PDO("mysql:host=localhost;dbname=fuel", "root", "")) {
        
            
        }else{
            throw new Exception("Error Processing Request", 1);
            
        }
        if ($con = mysqli_connect("localhost", "root", "", "fuel")) {
       
        	
            
        }else{
            throw new Exception("Error Processing Request", 1);
            
        }
    }
    catch(Exception $e){
        echo $e->getMessage();

    }
?>