<?php
class EZYDBO
{
	var $link = "";
	var $noofrows = 0;
	var $querystr = "";
	var $tablename = "";
	function __construct()
	{
	
		$this->link = mysql_connect(EZYSERVERNAME,EZYDBUSERNAME,EZYDBPASSWORD)
		or
		die('Cannot connect to the database because: ' . mysql_error());
	
		$this->SetDatabase();
	}
	
	public function SetTable($tablename)
	{
	$this->tablename = $tablename;
	}
	public function SetDatabase()
	{
		@mysql_select_db(EZYDBNAME) or die( "Unable to select database");
	}
	public function __destruct()
	{
		@mysql_close();
	}
	
	function Query($querystr)
	{
		$this->querystr = $querystr;
		$result=mysql_query(stripslashes($querystr))or mysql_error();
			
		if($result)
		{
		//	$this->noofrows=mysql_num_rows($result);
			return $result;
		}
		else{
			return false;
		}
	
	}
	function Insert($valarr)
	{
		$qrystr = 'INSERT INTO '.$tablename.' VALUES( ' ;
		foreach($valarr as $item)
		{
			$qrystr .= '"'.$item.',"';
		}
		$this->querystr = $qrystr;
		$result=mysql_query($qrystr);
		return $result;
	}
	function Update($tablename, $Columnnamevalue)
	{
	}
	function Delete($tablename, $where)
	{
	}
	function GetError()
	{
		return mysql_error($this->link);
	}
	
	function GetValue($table, $feild, $where)
	{
		$querystr = "Select ".$feild." from ".$table." WHERE ".$where;
		$this->querystr = $querystr;
		$result=mysql_query($querystr);
		if($result)
		{
			if(mysql_num_rows($result) == 0)
				return false;
			else
				return mysql_result($result,0);
		}
		else
			return false;
	}
		
	function GetCount($table, $where="")
	{
		$querystr = "Select COUNT(*) from ".$table;
		if($where != "")
			$querystr = $querystr ." WHERE ".$where;
		$result=mysql_query($querystr);
			
		if(mysql_num_rows($result) == 0)
			return -1;
		else
			return mysql_result($result,0);
			
	}
	
	};
	?>