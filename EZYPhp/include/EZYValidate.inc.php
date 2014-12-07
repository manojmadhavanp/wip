<?php
class EZYValidate
{
	function Sanitize($value)
	{
		return $value;
	}
	function isValidWord($value)
	{
		if(!preg_match("/[^a-zA-Z]+$/s",$value))
			return true;
		else
			return false;
	}
	
	function isValidString($value)
	{
		if(!preg_match("/[^a-zA-Z\ ]+$/s",$value))
			return true;
		else
			return false;
	}
	
	function isValidAlpaNumString($value)
	{
		if(!preg_match("/[^a-zA-Z0-9\ ]+$/s",$value))
			return true;
		else
			return false;
	}
	
	function isValidAlpaNumStringSym($value)
	{
		if(!preg_match("/[^a-zA-Z0-9.-_\ ]+$/s",$value))
			return true;
		else
			return false;
	}
	function isValidAlpaNumStringSymCustom($value)
	{
		if(!preg_match("/[^a-zA-Z0-9.-_()&#!%+\",'\ ]+$/s",$value))
			return true;
		else
			return false;
	}
	function isValidNumber($value)
	{
		//echo $value."Value Basic";
		if(!preg_match("/[^0-9]+$/s",$value))
			return true;
		else
			return false;
	}
	function isValidFloat($value)
	{
		if(!preg_match("/[^0-9.]+$/s",$value))
			return true;
		else
			return false;
	}
	function isValidPhoneNo($value)
	{
		if(!preg_match("/[^0-9\ ]+$/s",$value))
			return true;
		else
			return false;
	}
	
	function isvalidURL($URL) 
	{
		
		if(!preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $URL))
			return true;
		else
			return false;
	}
	
	
	
	function isValidIFSC($value)
	{
		if(strlen($value) < 11 || strlen($value) >11)
		{
			return false;
		}
		else
		{
			$alphabets = substr($value, 0,4);
	
			if($this->isValidWord($alphabets))
			{
				$number = substr($value, 4 ,7);
				if($this->isValidNumber($number))
					return true;
				else
					return false;
			}
			else
				return false;
		}
	}
};
?>