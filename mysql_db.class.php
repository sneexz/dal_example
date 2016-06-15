<?php

class MySqlDB extends DBBase implements DB {
    private $new_link = true;
    private $client_flags = 0;
    
    public function __construct() {
        $this->connect();
        $this->select_db($this->dbname);
    }
    
    public function __destruct() {
        $this->close();
    }
    
    public function connect() {
        $this->link = mysql_connect($this->host, $this->user, $this->pass, $this->new_link, $this->client_flags);
    }

    public function errno() {
        return mysql_errno($this->link);
    }

    public function error() {
        return mysql_error($this->link);
    }

    public function escape_string($string) {
        return mysql_real_escape_string($string);
    }

    public function query($query) {
        $this->last_sql = $query;
        return mysql_query($query, $this->link);
    }
    
    public function fetch_array($result, $array_type = MYSQL_BOTH) {
        return mysql_fetch_array($result, $array_type);
    }

    public function fetch_row($result) {
        return mysql_fetch_row($result);
    }
    
    public function fetch_assoc($result) {
        return mysql_fetch_assoc($result);
    }
    
    public function fetch_object($result)  {
        return mysql_fetch_object($result);
    }
    
    public function num_rows($result) {
        return mysql_num_rows($result);
    }
    
    public function close() {
        return mysql_close($this->link);
    }
    
    public function select_db($db) {
        return mysql_select_db($db, $this->link);
    }
}