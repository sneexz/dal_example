<?php

class Response {

    public $request;

    public function __construct(Request $request = null) {
        $this->request = $request;
        if ($request === null) {
            $this->request = new Request;
        }
        $this->headers();
    }

    public function headers ()
    {
        switch ($this->request->accept) {
            case 'application/json':
                header('Content-Type: application/json');
                break;
        }
    }

    public function serialize($response)
    {
        $data = $this->validateResponse($response);
        $return = [];
        switch ($this->request->accept) {
            case 'application/json':
                return json_encode($this->utf8ize($data));
                break;
            default:
                break;
        }
        return $return;
    }

    public function validateResponse($response)
    {
        if (is_a($response, 'Exception')) {
            $success = false;
            $message = $response->getMessage();
        } else {
            $success = true;
            $message = 'Operation successful';
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $response,
        ];
    }

    public function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = $this->utf8ize($v);
            }
        } else if (is_string ($d)) {
            return utf8_encode($d);
        }
        return $d;
    }
}