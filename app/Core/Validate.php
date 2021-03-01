<?php

namespace App\Core;

class Validate
{
    private $error;

	function __construct()
    {
		$this->error=array();
	}

    public function isValid()
    {
		return (count($this->error) == 0);
	}

    public function getError()
    {
		return $this->error;
	}

    public function requiredCheck(string $strVal, string $strErr)
    {
		if (is_null($strVal) || trim($strVal) == '') {
            return $this->error[] = "Please enter " . $strErr;
		}
	}

    public function dateCheck(string $strVal, string $strErr)
    {
		if (!is_null($strVal) && trim($strVal)!='') {
            if(!preg_match('/^\d{4}([\/-])(((0)[0-9])|((1)[0-2]))([\/-])([0-2][0-9]|(3)[0-1])$/', $strVal)){
                return $this->error[] = "Incorrect time format (yyyy-m-d) " . $strErr;
            }
		}
	}

    public function numberCheck(string $strVal)
	{
		if (!is_null($strVal) && trim($strVal)!='') {
			if(!is_numeric($strVal)){
				return $this->error[] = "Please enter number";
			}
		}
	}

    

}