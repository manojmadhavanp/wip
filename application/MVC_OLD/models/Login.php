<?
class Login_Model extends EZYModel
{
function __construct()
	{
	$this->tablename="useraccess";
	$this->tablecontrol="useraccess_username";
	}
function GetUserInfo($username)
{
	$Querystr = 'SELECT * FROM useraccess WHERE useraccess_username="'.$username.'"';
	//echo $Querystr;
	$ret = $this->Query('*',$Querystr);
	if($ret)
		return $ret[0];
}

function ConfirmPwd($username, $pwd)
{
	$ret = $this->GetUserInfo($username);
	
	if($ret)
	{	
	  $UserInfo = $ret;
	  
	  if($UserInfo['useraccess_password'] == $pwd)
	  {
	   if($UserInfo['useraccess_isActive']==1)
	   {
	   $userrole = $UserInfo['useraccess_Role'];
	   $_SESSION['userregID'] = $UserInfo['useraccess_userregID'];
	   return $userrole;
	   }
	    else  
	    return false;
	  }
	   else 
	   return false;
			
	}
	else
	return false;
	//print_r($ret);
}
};
?>