<?php

class Repository {

    private $connection;

    public function __construct ($connection = null)
    {
    	// init connection is none supplied
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = new MySQLDB;
        }
    }

    public function set($data)
    {
    	$columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($data));
    	$connection = $this->connection;
		$values = array_map(function ($value) use ($connection) {
		  if ($value === null) return null;
		  return $connection->escape_string((string) $value);
		}, array_values($data));

		$set = '';
		for ($i = 0; $i < count($columns); $i++) {
		  $set .= ($i > 0 ? ',' : '') . '`' . $columns[$i] . '`=';
		  $set .= ($values[$i] === null ? 'NULL' : '"' . $values[$i] . '"');
		}
		return $set;
    }

    public function execute ($sql)
    {
    	// gets results and returns error if occurred, else returns results
    	$result = $this->connection->query($sql);
    	if (!$result) {
    		return new Exception($this->connection->error());
    	} else {
    		if (gettype($result) == 'boolean') {
    			return $result;
    		} else {
    			return $this->toArray($result);
    		}
    	}
    }

    public function toArray ($result)
    {
    	$array = [];
    	while ($row = $this->connection->fetch_assoc($result)) {
    		extract($row);
    		$array[] = $row;
		}

		// return first result if only one exists, else return array of results
		if (count($array) != 0 && count($array) == 1) {
			return array_shift($array);
		} else {
			return $array;
		}
    }

}