<?
class Visitor extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
            
			$visit = new Visitor_Model();
			$EventID = $_SESSION['EventID'];
			$visits = $visit->GetAllVisitors($EventID);	
				
			
			$this->Set('visits',$visits);
			$this->LoadView('memheader.php');
			$this->LoadView('Visitorgrid.php');
			$this->LoadView('footer.php');
			$this->render();
			
		}
	}
	
	function NewVisitorForm()
	{
	
		$this->LoadView('VisitorForm.php');
		echo $this->Render(TRUE);
	}
	function LoadVisitorForm()
	{
		$UpdateCtrls=array();
		array_push($UpdateCtrls,new EZYUpdate('FName','focus',EZYCtrlType::SetFocus));
		EZYReturn::Update($UpdateCtrls);
	}
	function AddNewVisitor()
	{
	$UpdateCtrls=array();
	
	$validate=$this->Validate();
	if(!($validate == 'true'))
	{
	array_push($UpdateCtrls,new EZYUpdate('Visitor-FormError',$validate,EZYCtrlType::Error));
	EZYReturn::Update($UpdateCtrls);
	return false;
    }
	$visit= new Visitor_Model();
	$visit->Set('visitor_prefix',$_REQUEST['prefixer']);
    $visit->Set('visitor_FName',$_REQUEST['FName']);
	$visit->Set('visitor_MName',$_REQUEST['MName']);
	$visit->Set('visitor_LName',$_REQUEST['LName']);
	$visit->Set('visitor_Designation',$_REQUEST['Designation']);
	$visit->Set('visitor_CompanyName',$_REQUEST['CompanyName']);
	$visit->Set('visitor_Priority',$_REQUEST['Priority']);
   $visit->Set('visitor_Mobile',$_REQUEST['Mobile']);
	$visit->Set('visitor_Email',$_REQUEST['Email']);
	$visit->Set('visitor_Telephone',$_REQUEST['Telephone']);
	$visit->Set('visitor_Code',$_REQUEST['stdcode']);
	$visit->Set('visitor_EXT',$_REQUEST['telexts']);
	$visit->Set('website',$_REQUEST['Website']);
	$visit->Set('faxcode',$_REQUEST['Faxcode']);
	$visit->Set('faxno',$_REQUEST['Faxno']);
	$visit->Set('Address1', urlencode($_REQUEST['hdnAddress1']));
	$visit->Set('Address2',urlencode($_REQUEST['hdnAddress2']));
	$visit->Set('visitor_Landmark',$_REQUEST['hdnLandmark']);
	$visit->Set('Pin_no',$_REQUEST['hdnPinno']);
	$visit->Set('visitor_Location',$_REQUEST['hdnLocation']);
	$visit->Set('visitor_Country',$_REQUEST['hdnCountry']);
	$visit->Set('visitor_State',$_REQUEST['hdnState']);
	$visit->Set('visitor_City',$_REQUEST['hdnCity']);
	$visit->Set('visitor_Remark',$_REQUEST['Remark']);
	$visit->Set('visitor_Adddetails',$_REQUEST['Adddetails']);
	$visit->Set('visitor_UserregID ',$_SESSION['UID']);
	$visit->Set('Event_ID',$_SESSION['EventID']);
	$visit->Set('Company_ID',$_SESSION['CompID']);
	if(!$visit->CheckDuplicate($_SESSION['CompID']))
	{
	$ret=$visit->Insert();
	if(!$ret)
	{
	array_push($UpdateCtrls,new EZYUpdate('Visitor-FormError','DBError',EZYCtrlType::Error));
	   EZYReturn::Update($UpdateCtrls);
	return false ;
	}
	else
	{
	$retval = '<tr><td>'.$_REQUEST['prefixer']. ' '. $_REQUEST['FName'].' '.$_REQUEST['MName'].' '.$_REQUEST['LName'].' '.$_REQUEST['Designation'].'</td><td>'.$_REQUEST['Mobile'].''.$_REQUEST['Telephone'].' '.$_REQUEST['Email'].'</td><td>'.$_REQUEST['Priority'].'</td><td>'.$_REQUEST['hdnAddress1'].' '.$_REQUEST['hdnAddress2'].' '.$_REQUEST['hdnLandmark'].' '.$_REQUEST['hdnPinno'].' '.$_REQUEST['hdnLocation'].' '.$_REQUEST['hdnCountry'].' '.$_REQUEST['hdnState'].' '.$_REQUEST['hdnCity'].'</td></tr>';
	
	array_push($UpdateCtrls,new EZYUpdate('Vistor-FormError','Visitor Sucessfully Added',EZYCtrlType::Sucess));
	array_push($UpdateCtrls, new EZYUpdate('VistorGrid',$retval,EZYCtrlType::Append));
	array_push($UpdateCtrls, new EZYUpdate('Visitor-AddNewVisitor',$retval,EZYCtrlType::Update));
			EZYReturn::Update($UpdateCtrls);
	}
}
	else
	{
		array_push($UpdateCtrls, new EZYUpdate('','Visitor exist in event',EZYCtrlType::Update));
			EZYReturn::Update($UpdateCtrls);
	}
}

	function Validate()
	{
	 $validate = new FormValidate();
	
	if(($validate->isEmpty($_REQUEST['FName'])) && ($validate->isEmpty($_REQUEST['MName']))&& ($validate->isEmpty($_REQUEST['LName'])))
		return 'Enter visitors name';
	elseif ((!($validate->isEmpty($_REQUEST['FName'])))&&(!($validate->isValidMinMaxString($_REQUEST['FName'],3,35))))
		return 'Enter Valid First Name';
	elseif(($validate->isEmpty($_REQUEST['MName'])) && ($validate->isEmpty($_REQUEST['LName'])))
		return 'Enter your Middle Name or Last Name';	
	elseif ((!($validate->isEmpty($_REQUEST['MName']))) && (!($validate->isValidMinMaxString($_REQUEST['MName'],3,35))))
		return 'Enter Valid Middle Name';
	elseif ((!($validate->isEmpty($_REQUEST['LName'])))&&(!($validate->isValidMinMaxString($_REQUEST['LName'],3,35))))
		return 'Enter Valid Last Name';
	elseif(($validate->isEmpty($_REQUEST['CompanyName'])))
		return 'Company name should not be Empty';
	elseif((!($validate->isEmpty($_REQUEST['CompanyName'])))&&(!($validate->isValidMinMaxAlphaNumString($_REQUEST['CompanyName'],3,35))))
	    return 'Company name is not valid';
	elseif(($validate->isEmpty($_REQUEST['Designation'])))
		return 'Designation  should not be Empty';
	elseif((!($validate->isEmpty($_REQUEST['Designation'])))&&(!($validate->isValidMinMaxString($_REQUEST['Designation'],3,35))))
		return 'Enter Valid Designation of Visitor';
	elseif(($validate->isEmpty($_REQUEST['Mobile']))&&($validate->isEmpty($_REQUEST['Email']))&&($validate->isEmpty($_REQUEST['Telephone'])))
	 	return 'Enter either Mobile no or EmailID or Telephone No';
	elseif((!($validate->isEmpty($_REQUEST['Email'])))&&(!($validate->isValidateEmail($_REQUEST['Email']))))
		 return 'Enter Valid Email ID';
	elseif((!($validate->isEmpty($_REQUEST['Mobile'])))&&(!($validate->isValidateMobileNo($_REQUEST['Mobile']))))
	 	return 'Enter Valid Mobile No';
	elseif((!($validate->isEmpty($_REQUEST['Telephone'])))&&(!($validate->isValidateMinMaxNumber($_REQUEST['Telephone'],6,8))))
		return 'Enter validate telephone no';
	/*elseif((!($validate->isEmpty($_REQUEST['Website'])))&& (($validate->isvalidURL($_REQUEST['Website']))))
		return 'URl is not valid';*/
	elseif((!($validate->isEmpty($_REQUEST['Faxcode'])))&& (!($validate->isValidateMinMaxNumber($_REQUEST['Faxcode'],2,4))))
		return 'Faxno is not valid';
	elseif((!($validate->isEmpty($_REQUEST['Faxno'])))&& (!($validate->isValidateMinMaxNumber($_REQUEST['Faxno'],6,8))))
		return 'Faxno is not valid';
	 elseif(!($validate->isEmpty($_REQUEST['Adddetails']))&&(!($validate->isValidateEmail($_REQUEST['Adddetails'] ,15,255))))
	return 'Not a valid additional info';
	return 'true';
  }
};

?>