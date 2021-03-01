<?php

namespace App\Libs;

use PDO;

class Database 
{

	protected $db;
	
	public function __construct() {
		$config = require_once 'config/database.php';
		try {
			$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['user'], $config['password']);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  } catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		  }
	}

	public function query(string $sql, array $params = []) {
		$stmt = $this->db->prepare($sql);
		$stmt->execute($params);
		return $stmt;
	}

	public function fetchRow(string $sql, array $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

}