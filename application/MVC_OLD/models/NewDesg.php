<?
class NewDesg_Model extends EZYModel
{
   function __construct()
	{
		$this->tablename = "designation";
		$this->tablecontrol = "designationc_id";
	}
	function GetAllDesg($dID)
	{
	//echo $UID;
	$Query = 'SELECT * FROM designtion WHERE designation_ID='.$dID;
	$ret = $this->Query('*',$Query);
	if($ret)
		return $ret;
	}
	function CheckDuplicate($dID)
	{
	$qry='SELECT  designation_ID from designtion WHERE designtion_Name ="'.$this->Get('designtion_Name').'" and designation_ID="'.$dID.'"';
	$desig= new NewDesg_Model();
	$ret = $desig->Query('*',$qry);

	if($ret)
	{
	return true;
	}
	else
	return false;
	 
	}
	
};
?>