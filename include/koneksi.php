<?php
try 
{
    $DBH = new PDO("mysql:host=localhost;dbname=db_spare_part", "root", "");
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     
} catch (PDOException $e) {
    echo "Terjadi error..";
    echo $e->getMessage();
}
error_reporting(0);

?>