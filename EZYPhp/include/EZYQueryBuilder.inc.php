<?
class Action
{
	const INSERT='INSERT';
	const SELECT='SELECT';
	const UPDATE='UPDATE';
	const DELETE='DELETE';
}
class Order
{
	const ASSENDING = 'ASC';
	const DESENDING = 'DESC';
}
class Join
{
	const INNERJOIN = '';
	const OUTERJOIN= '';
	const LEFTOUTERJOIN='';
	const RIGHTOUTERJOIN='';
	const LEFTINNERJOIN='';
	const RIGHTINNERJOIN='';
}
abstract class EZYQueryBuilder 
{
	public $tablename = NULL;
	public $tablecontrol = NULL;
	
	private $joints = NULL;
	private $relationship = NULL;
	private $columns = NULL;
	function __construct()
	{
		$this->columns = array();
	}
	
	function Action(Action $Action)
	{
		return $this;
	}
	function Values(array $colarr)
	{
	}
	function OrderBy(string $column_name, Order $Order)
	{
	}
	function Where(string $column_name, string $value)
	{
	}
	function Join(string $table, $jointype)
	{
	}
	function TableName($tblname)
	{
		$this->tablename = $tblname;
	}
	function TableController($tblctrl)
	{
		$this->tablecontrol = $tblctrl;
	}
	function Execute()
	{
		if($this->isvariableset($this->control_column) && $this->isvariableset($this->tablename))
		{
			
		}
	}
	private function isvariableset($variable)
	{
		if(!isset($variable))
		 return false;
		else if($variable == NULL)
			return false; 
		else
			return true;
	}
	
};
?>