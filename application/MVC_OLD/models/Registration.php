<?
class Registration_Model extends EZYModel
{
	
	function __construct()
	{
		$this->tablename = "userreg";
		$this->tablecontrol = "userreg_ID";
	}
	
	function GetAllRegs()
	{
	 $ret = $this->Query();
	 if($ret)
	 return $ret;
	
	}
	
	function GetAllUsers()
	{
		
		return $this->Query();
	}
  
	
	function CheckDuplicate()
	{
	$Query = 'SELECT * FROM userreg WHERE userreg_EmailID="'.$this->Get('userreg_EmailID').'" OR userreg_MobileNo ="'.$this->Get('userreg_MobileNo').'"';
		$ret= $this->Query('*',$Query);
		//print_r($ret);
		//EZYLog::DebugPrint($ret);
		if($ret)
		{ 
		 return true;
		}	
		 else
		 return false;
		
		
	}
	 function GetRegDetails()
   {
   $Qry='SELECT * FROM userreg';
	 $ret=$this->Query('*',$Qry);
	 if($ret)
	 return $ret;
	 else
	 return false;
	  
   }
};
?>