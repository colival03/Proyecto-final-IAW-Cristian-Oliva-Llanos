<?php

class Database {
    public static function connect () {
        $host='mariadb';
        $dbname=('tiendacoches');
        try{
            $dsn='mysql:host='.$host.';dbname='.$dbname.';charset=UTF8';
            $dbh=new PDO ($dsn, 'root', 'changepassword');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
        return $dbh;
    }
}

?>
