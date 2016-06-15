<?php

class DBBase {
    public $last_sql;
    public $encryption = "md5";
    protected $host = DB_HOST;
    protected $port = 80;
    protected $user = DB_USERNAME;
    protected $pass = DB_PASSWORD;
    protected $dbname  = DB_NAME;
    protected $link;
}