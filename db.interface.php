<?php

interface DB {
    public function connect();
    public function error();
    public function errno();
    public function escape_string($string);
    public function query($query);
    public function fetch_array($result);
    public function fetch_row($result);
    public function fetch_assoc($result);
    public function fetch_object($result);
    public function num_rows($result);
    public function close();
}