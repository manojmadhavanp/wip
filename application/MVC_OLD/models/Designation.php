<?
class Designation_Model extends EZYModel
{
function __construct()
{
	$this->tablename="designationcat";
	$this->tablecontroller="designationcat_ID";
}
function GetAllDesig()
{
$ret= $this->$Query();
if(ret)
return true;
else return false;

}

function AddDesignation()
	{
	$Qry='Select * from designationcat where designationcat_Name="'.$this->Get('designationcat_Name').'"';
	$ret=$Qry->Query('*',Qry);
	if($ret)
	return true ; 
	else
	return false;
	}
};
?>