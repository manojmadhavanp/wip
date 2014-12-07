<?
class User extends EZYController{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title','Error: Page not found');
			$this->Set('keyword','Error: Page not found');
			$this->Set('description','Error: Page not found');
			$this->LoadView('header.php');
			$this->LoadView('pagenotfound.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}
	function LoginForm()
	{
		$this->LoadView('LoginForm.php');
		echo $this->Render(TRUE);
	}
	function LoginValidate()
	 {
		 $validater = new FormValidate();
		 
		 if(!$validater->isValidateEmail($_REQUEST['username']))
			   return 'Enter Valid Email Address';
		 elseif($validater->isEmpty($_REQUEST['pwd']))
			return 'Please enter password';
		
		
		return 'true';	
	 }
	
	function LoginProcess()
	{
	  $UpdateCtrls=array();
	  $validate = $this->LoginValidate();
	  if($validate != 'true')
	  	{
		 array_push($UpdateCtrls,new EZYUpdate('Login-FormError','Invalid Login Details Provided',EZYCtrlType::Error));
			return EZYReturn::Update($UpdateCtrls);
		}
	 	
			$this->LoadModel('Login.php');
		   $user = new login_model();
		   $ret= $user->ConfirmPwd($_REQUEST['username'], $_REQUEST['pwd']);
		   if(!$ret)
		   {
		   	 array_push($UpdateCtrls,new EZYUpdate('Login-FormError','Invalid Login',EZYCtrlType::Error));
			return EZYReturn::Update($UpdateCtrls);
		   }
			
			     $UserInfo =$user->GetUserInfo($_REQUEST['username']);
				 $UID = $UserInfo['useraccess_ID'];
				 $CompID  = $UserInfo['useraccess_userregID'];
				 $UserRole = $UserInfo['useraccess_Role'];
				 $_SESSION['UID']=$UID;
				 $_SESSION['CompID']=$CompID;
				 $_SESSION['UserRole']= $UserRole;
			if($UserRole == 1)
			  array_push($UpdateCtrls, new EZYUpdate('','Admin',EZYCtrlType::Location));
			elseif($UserRole == 2)
			 array_push($UpdateCtrls, new EZYUpdate('','Dashboard',EZYCtrlType::Location));
				
			return EZYReturn::Update($UpdateCtrls);
				
			
	}
	/*function CheckLogin()
	{
		unset($_SESSION['userregID']);
		$username = $_REQUEST['username'];
		$pwd = $_REQUEST['password'];
		
		$login = new login_model();
		$userrole=$login->CheckLogin($username,$pwd);
		echo $userrole;
	
		if($userrole == 1)
			return AppReturn('./Application.php?request=RegDetails','true','Location');
		elseif($userrole == 2)
			return AppReturn('./Application.php?request=Dashboard','true','Location');
		else
			return AppReturn('Invalid login. Check Login Details');
	}*/
	
	function RegistrationForm()
	{
		$this->LoadView('Registration.php');
		echo $this->Render(TRUE);
	}
	function AddNewRegistration()
	{
        $this->LoadModel('Registration.php');
 	    $reg=new Registration_Model();
		
		$maxid = $reg->GetNextID();
		$reg->Set('Name',$_REQUEST['Name']);
		$reg->Set('userreg_Company',$_REQUEST['CompanyName']);
		$reg->Set('userreg_EmailID', $_REQUEST['EmailID']);
		$reg->Set('userreg_Password', $_REQUEST['Password']);
		$reg->Set('userreg_MobileNo', $_REQUEST['MobileNo']);
		
       
		if(!$reg->CheckDuplicate())
		{
			$ret= $reg->Insert();
		if($ret)
			return $maxid;
		else
			return false;
			}
			else
			return false;
     }
	
	 function AddNewUser($Regid)
	 { 
	 	$this->LoadModel('User.php');
	 	$user = new User_Model();
		$user->Set('useraccess_username',$_REQUEST['EmailID']);
		$user->Set('useraccess_password',$_REQUEST['Password']);
	    $user->Set('useraccess_userregID',$Regid);
	    $ret=$user->Insert();
		if($ret)
		return true;
		else 
		return false;
		
	 }
	 
	 function ProcessReg()
	  {
		$UpdateCtrls = array();
		$validate = $this->RegValidate();
	if($validate == 'true')
	{	
		$Regid = $this->AddNewRegistration();
		 if($Regid)
			{
				$Reg=$this->AddNewUser($Regid);
					if($Reg)
					  {
					  array_push($UpdateCtrls, new EZYUpdate('','Email',EZYCtrlType::Location));
					EZYReturn::Update($UpdateCtrls);
					  }
					  else 
					  {
					  array_push($UpdateCtrls, new EZYUpdate('Registration-FormError','DBError:User not created',EZYCtrlType::Error));
					EZYReturn::Update($UpdateCtrls);
					  }
			}	  
			else
				  {
				array_push($UpdateCtrls, new EZYUpdate('Registration-FormError','Already Registered Email or Mobile No',EZYCtrlType::Error));
				EZYReturn::Update($UpdateCtrls);
				  }
			}	  
			  else
			  {
			 array_push($UpdateCtrls, new EZYUpdate('Registration-FormError',$validate,EZYCtrlType::Error));
			EZYReturn::Update($UpdateCtrls);
			  }
			 
}
	
	
	function RegValidate()
	{
	//print_r($_REQUEST);
	
	$validater = new FormValidate();
	if(!$validater->ValidateCompanyName($_REQUEST['Name']))
		return 'Enter Valid Name';
	elseif(!$validater-> isValidMinMaxAlphaNumString($_REQUEST['CompanyName'],2,30))
		return 'Enter Valid Companyname';
	elseif(!$validater->isValidateMobileNo($_REQUEST['MobileNo']))
		return 'Not a valid Mobile No';
	elseif(!$validater->isValidateEmail($_REQUEST['EmailID']))
		return 'Enter Valid Email Address';
	elseif($validater->isEmpty($_REQUEST['Password']))
		return 'Password should not be Empty';
	
	elseif(!(($_REQUEST['Password'])==($_REQUEST['RePassword'])))
		   	return 'Password does not match'; 
	elseif(!$validater->isValidPassword($_REQUEST['Password'], 8,35))
			return 'Password should be in correct format';
	elseif(!isset($_REQUEST['terms']))
		return 'Please Agree the Term Email';
	else
	return 'true';
	 }
	 
	 
	 function ForgotForm()
	{
		$this->LoadView('ForgotPwd.php');
		echo $this->Render(TRUE);
	}
	
 function ForgotValidate()
	 {
		 $validater = new FormValidate();
		 
		 if(!$validater->isValidateEmail($_REQUEST['username']))
			   return 'Enter Valid Email Address';
	 return 'true';
	 
	}
	function ForgotProcess()
	{
	
	  $UpdateCtrls=array();
	  $validate = $this->ForgotValidate();
	  if($validate == 'true')
	{
	$this->LoadModel('ForgotPwd.php');
	   $email=new ForgotPwd_Model();
	   $ret=$email->Emailid($_REQUEST['username']);
		if($ret)
		{
		    array_push($UpdateCtrls, new EZYUpdate('','PwdReset',EZYCtrlType::Location));
						EZYReturn::Update($UpdateCtrls);
		}
		else
		{
		    array_push($UpdateCtrls, new EZYUpdate('Registration-FormError','Email Not Registered ',EZYCtrlType::Error));
					EZYReturn::Update($UpdateCtrls);
		}
		
	}
	}
};
?>