<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/19/2015
 * Time: 9:33 AM
 */

class DB {
    private static $_instance = null;
    private $_pdo,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;
//        $_db = 'smsystem',
//        $_username = 'root',
//        $_password = '';

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=localhost;dbname=smsystem;charset=utf8', 'root', '');
//            echo "connected :)";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql,$params = array()){
        $this->_query = $this->_pdo->prepare($sql);

        if(count($params)){
            if($this->_query->execute($params)){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }
        }

        if(count($params)==0){
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }
        }
        return $this;
    }

    public function count(){
        return $this->_count;
    }

    public function results(){
        return $this->_results;
    }


    //chathuranga
    public function lastId(){
        return $this->_pdo->lastInsertId();
    }

}