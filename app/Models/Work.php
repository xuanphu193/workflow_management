<?php

namespace App\Models;

use App\Core\Model;

class Work extends Model 
{

	protected $tableName = 'work';

	public function getList()
    {
		$sql = "SELECT
			id,
			work_name,
			start_date,
			end_date,
			status
			FROM {$this->tableName}";
		return $this->db->fetchRow($sql);
	}

	public function getWorkDetailById(string $id)
	{
		$sql = "SELECT 
			id,
			work_name,
			start_date,
			end_date,
			status
			FROM {$this->tableName}
			WHERE
			id = ?
			";

		return $this->db->fetchRow($sql,[$id]);
	}

	public function getWorkFromStartToEndDay(string $startDate, string $endDate)
	{
		$sql = "SELECT 
				id,
				work_name,
				start_date,
				end_date,
				status
			FROM 
				{$this->tableName}
			WHERE 
			(start_date BETWEEN ? AND ?
			OR end_date BETWEEN ? AND ?)"; 
		return $this->db->fetchRow($sql,[$startDate, $endDate, $startDate, $endDate]);
	}

}