<?php

class EmployeeRepository extends Repository {

    private $table = 'employee';

    public function __construct ()
    {
        parent::__construct();
    }

    public function findAll ()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->execute($sql);
    }

    public function findByCompany ($company_id = null)
    {
         $sql = "SELECT e.id, e.company_id, e.name, e.description FROM $this->table AS e 
             INNER JOIN company AS c
             ON e.company_id  = c.id";
         $sql .= ($company_id ? " WHERE c.id = $company_id " : '');
        return $this->execute($sql);
    }

    public function createForCompany ($data, $company_id = null)
    {
        if ($company_id != null) {
            $data['company_id'] = $company_id;
        } else {
            return new Exception('Employees must have a company assigned, even freelancers!');
        }
        $set = $this->set($data);
        $sql = "INSERT INTO $this->table SET $set";
        return $this->execute($sql);
    }
}