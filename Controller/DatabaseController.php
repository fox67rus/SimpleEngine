<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 12:50
 */

namespace SimpleEngine\Controller;


class DatabaseController
{
    private $db;
    public static $connection = NULL;
    public static function connection()
    {
        if (self::$connection == NULL)
        {
            self::$connection = new self();
        }
        return self::$connection;
    }
    private function __construct()
    {
        $database = "test";
        $host = "localhost";
        $user = "root";
        $password = "user";
        $this->db = new PDO('mysql:dbname='.$database.';host='.$host.';charset=UTF8', $user, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone()    { self::connection(); }
    private function __wakeup()   { self::connection(); }

    public function beginTransaction() {
        return $this->db->beginTransaction();
    }

    public function execute($params){
        return $this->db->execute($params);
    }

    public function commit() {
        return $this->db->commit();
    }

    public function rollBack() {
        return $this->db->rollBack();
    }

    public function errorInfo() {
        return $this->db->errorInfo();
    }

    public function exec($statement) {
        return $this->db->exec($statement);
    }

    public function getAttribute($attribute) {
        return $this->db->getAttribute($attribute);
    }

    public function setAttribute($attribute, $value  ) {
        return $this->db->setAttribute($attribute, $value);
    }

    public function getAvailableDrivers(){
        return $this->db->getAvailableDrivers();
    }

    public function lastInsertId($name) {
        return $this->db->lastInsertId($name);
    }

    public function prepare ($statement, $driver_options=false) {
        if(!$driver_options) $driver_options=array();
        return $this->db->prepare($statement, $driver_options);
    }

    public function query($statement) {
        return $this->db->query($statement);
    }

    public function queryFetchAllAssoc($statement) {
        return $this->db->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAll($fetch_style, $fetch_argument, $ctor_args = array()){
        return $this->db->fetchAll($fetch_style, $fetch_argument, $ctor_args);
    }

    public function queryFetchRowAssoc($statement) {
        return $this->db->query($statement)->fetch(PDO::FETCH_ASSOC);
    }

    public function queryFetchColAssoc($statement) {
        return $this->db->query($statement)->fetchColumn();
    }

    public function quote ($input, $parameter_type=0) {
        return $this->db->quote($input, $parameter_type);
    }
}