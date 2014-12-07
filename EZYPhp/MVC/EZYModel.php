<?php
abstract class EZYModel extends EZYQueryBuilder
{
	public $data = NULL;
	
	function __construct()
	{
		$this->data = array();
	}
	function __destruct()
	{
		unset($this->data);
	}
	
	function __set($column_name, $value)
	{
		$this->data[$column_name] = $value;
	}
	function __get($column_name)
	{
		return $this->data[$column_name];
	}
	function Set($column_name, $value)
	{
		$this->data[$column_name] = $value;
	}
	function Get($column_name)
	{
		return $this->data[$column_name];
	}
	
	function Query($id='*', $query=NULL)
	{
		$retarray = NULL;
		
		$dbcon = new EZYDBO();
		if($query == NULL)
			$query = 'SELECT * FROM '.$this->tablename;
		
		if($id != '*')
			$query .= ' WHERE '.$this->tablecontrol.' = "'.$id.'"';
		
		$result =  $dbcon->Query($query);
		if($result)
		{
			$retarray = array();
			while($row = mysql_fetch_assoc($result))
			{array_push($retarray, $row);}
		}
		$cnt = sizeof($retarray);
	
		if($cnt > 0)
			return $retarray;
		else
		return false;
		
	}
	
public function Insert()
{
	if($this->tablename == NULL)
		return false;
	else
	$query = "INSERT into ".$this->tablename;

	if(isset($this->data))
	{
		$values = "VALUES (";
		$query .= ' (';
		$int = 1;
		$cnt = sizeof($this->data);
		foreach($this->data as $column_name => $column_value)
		{
			$query .= $column_name;
			$values .= '"'.$column_value.'"';
			if($int != $cnt)
			{
				$query .= ', ';
				$values .= ', ';
				
			}
			$int++;
		}
		
		$query .= ') '.$values .')';
		
	} 
	//print_r($query);
	$dbcon = new EZYDBO();
	//echo $query;
	return $dbcon->Query($query);
	
}
public function GetNextID()
{
	$query = "SELECT MAX(".$this->tablecontrol.") FROM ".$this->tablename;
	$dbcon = new EZYDBO();
	$ret= $dbcon->Query($query);
	return mysql_result($ret,0);
}
public function Delete(){}
public function Update(){}
public function Select(){}	
};
?>