<?php

namespace App\Core;

use App\Libs\Database as DB;
use Exception;

abstract class Model {

	public $db;
    protected $tableName;
	protected $primaryKeyName = 'id';
	
	public function __construct() {
		$this->db = new DB;
	}

    public function create(array $params)
    {
        $colStr = "";
		$valStr = "";
        $datas = [];
		$date = date("Y-m-d H:i:s");
		foreach ($params as $key => $value) {
			if($key !== $this->primaryKeyName) {
				$colStr .= $key . ",";
				$valStr .= "?,";
				$datas[] = $value;
			}
			
		}

		$colStr .= "createt_time, update_time";
		$valStr .= "?,?";
		array_push($datas, $date, $date);

        $sql = "INSERT INTO	{$this->tableName} ({$colStr}) VALUES ({$valStr})";
		try {
			return $this->db->query($sql, $datas);
		} catch (\Exception $e) {
			throw new Exception("Create failed");
		}
    }

    public function update(string $id, array $params)
    {
        $colStr = "";
		$datas = [];
		$date = date("Y-m-d H:i:s");
		foreach ($params as $key => $value) {
			if($key !== $this->primaryKeyName) {
				$colStr .= $key . " = ?,";
				$datas[] = $value;
			}
		}
		$colStr .= "update_time = ?";
		array_push($datas, $date, $id);

        $sql = "UPDATE {$this->tableName} SET {$colStr} WHERE id = ?";

		try {
			return $this->db->query($sql, $datas);
		} catch (\Exception $e) {
			throw new Exception("Update failed");
		}
    }

    public function delete(string $id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = ?";
		try {
			return $this->db->query($sql, [$id]);
		} catch (\Exception $e) {
			throw new Exception("Deletion failed");
		}
        
    }

}