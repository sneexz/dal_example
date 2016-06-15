<?php

class CompanyRepository extends Repository {
    
    private $table = 'company';

    public function __construct ()
    {
        parent::__construct();
    }

    public function findAll ($id = null)
    {
        $sql = "SELECT * FROM $this->table";
        $sql .= ($id ? " WHERE id = $id" : '');
        return $this->execute($sql);
    }

    public function create ($data)
    {   
        $set = $this->set($data);
        $sql = "INSERT INTO $this->table SET $set";
        return $this->execute($sql);
    }
}