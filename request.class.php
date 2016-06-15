<?php

class Request {

    public $method;
    public $accept;
    public $request;
    public $data;
    public $resource;
    public $resource_key;
    public $sub_resource;
    public $sub_resource_key;

    public function __construct() {
        $this->init();
    }

    private function init()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->accept = $_SERVER['HTTP_ACCEPT'];
        $this->request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
        $this->input = json_decode(file_get_contents('php://input'),true);

        if (!empty($this->request[0])) { $this->resource = preg_replace('/[^a-z0-9_]+/i','', $this->request[0]); }
        if (!empty($this->request[1])) { $this->resource_key = $this->request[1]; }

        if (!empty($this->request[2])) { $this->sub_resource = preg_replace('/[^a-z0-9_]+/i','', $this->request[2]); }
    }
}