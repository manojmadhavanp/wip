<?
class Visitor_Model extends EZYModel
{
function __construct()
	{
		$this->tablename = "visitor";
		$this->tablecontrol = "visitor_ID";
	}
	function GetAllVisitors($EventID)
	{
	$Query = 'SELECT * FROM visitor WHERE Event_ID='.$EventID;
	$ret = $this->Query('*', $Query);
	if($ret)
		return $ret;
	}
	
function CheckDuplicate($COMPID)
	{
	$qry='SELECT visitor_ID from visitor WHERE visitor_FName ="'.$this->Get('visitor_FName').'" and 	visitor_Mobile 	="'.$this->Get('visitor_Mobile').'" and Company_ID="'.$COMPID.'"';
	$visit= new Visitor_Model();
	$ret = $visit->Query('*',$qry);

	if($ret)
	{
	return true;
	}
	else
	return false;
	 
	}
	
};
?>
