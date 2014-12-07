<?
class Todo_Model extends EZYModel
{
	
	function __construct()
	{
		$this->tablename = "todo";
		$this->tablecontrol = "todoID";
	}
	
	function GetAllTask()
	{
		
		return $this->Query();
	}
	
};
?>