<?
class Email_Model extends EZYModel
{
	function __construct()
	{
		$this->tablename="userreg";
		$this->tablecontroller="userreg_ID";
	}
	function GetAllVisitor()
	{
		return $this->Query();
	}

	
};
?>