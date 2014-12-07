<?
class NewDesg extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$desg= new NewDesignation_Model():
			$desgs=$desg->GetAllDesg($dID)
			$this->Set('desgs',$desgs);
			$this->LoadView('memheader.php');
			$this->LoadView('NewDesg.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}

	function NewDesgForm()
	{
	$this->LoadView('NewDesg.php');
	echo $this->Render(TRUE);
	
	}
	function Validate()
		{
			if($_REQUEST['typedesignation'] == -1)
				return 'Select Type';
				
			if(!$this->isValidWord($_REQUEST['DesignationName']))
				return 'Enter Valid Designation';
			if(strlen($_REQUEST['DesignationName']) < 2)
				return 'Enter Valid Designation';
			return true;
		}
	function AddDesig()
	{
	
	$UpdateCtrls=array();
	$validate = $this->Validate();
	if($validate != 'true')
	{
		array_push($UpdateCtrls, new EZYUpdate('NewDesg-FormError',$validate,EZYCtrlType::Error));
			EZYReturn::Update($UpdateCtrls);
			return;
	}
	$desg = new NewDesg_Model();
	//print_r($_SESSION);

	$desg->Set('Designation_Name',$_REQUEST['DesignationName']);
	
	
	if(!$desg->CheckDuplicate($_SESSION['$dID']))
	{
	  
	$ret=$desg->Insert();
		if(!$ret)
		{
		array_push($UpdateCtrls, new EZYUpdate('NewDesg-FormError','DBError-',EZYCtrlType::Error));
				EZYReturn::Update($UpdateCtrls);
		}
		else 
		{
		$retval = '<tr><td>'.$_REQUEST['DesignationName'].'</td></tr>';
		
		array_push($UpdateCtrls, new EZYUpdate('Designationfrm',$retval,EZYCtrlType::Append));
		array_push($UpdateCtrls, new EZYUpdate('Designation-GetDesignation',$retval,EZYCtrlType::FormReset));
		array_push($UpdateCtrls, new EZYUpdate('Visitor-FormError','Designation Successfully Added',EZYCtrlType::Update));
			EZYReturn::Update($UpdateCtrls);
		}
	
	}
	else
	{
		array_push($UpdateCtrls, new EZYUpdate('NewDesg-FormError','Designation Already Register',EZYCtrlType::Update));
			EZYReturn::Update($UpdateCtrls);
	}
	
	}
	
	
	
	}
};
?>