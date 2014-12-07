<?
class Event_Model extends EZYModel
{
   function __construct()
	{
		$this->tablename = "event";
		$this->tablecontrol = "EventID";
	}
	function GetAllEvents($UID)
	{
	//echo $UID;
	$Query = 'SELECT * FROM event WHERE User_ID='.$UID;
	$ret = $this->Query('*',$Query);
	if($ret)
		return $ret;
	}
	function CheckDuplicate($COMPID)
	{
	$qry='SELECT EventID from event WHERE Event_Name ="'.$this->Get('Event_Name').'" and  Event_SDate="'.$this->Get('Event_SDate').'" and Company_ID="'.$COMPID.'"';
	$event= new Event_Model();
	$ret = $event->Query('*',$qry);

	if($ret)
	{
	return true;
	}
	else
	return false;
	 
	}
	
};
?>