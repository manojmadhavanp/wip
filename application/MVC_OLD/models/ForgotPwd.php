<?
class ForgotPwd_Model extends EZYModel
{
function __construct()
{
	$this->tablename="useraccess";
	$this->tablecontrol="useraccess_username";
}
function Emailid($username)
{      
	   $Qrystr='SELECT * FROM useraccess WHERE useraccess_username="'.$username.'" ';
	
		$ret= $this->Query('*',$Qrystr);
	    //echo $ret;
		if($ret)
		return true;
		else 
		return false;
}



};
?>