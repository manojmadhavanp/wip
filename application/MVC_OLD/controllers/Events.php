<?
class Events extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$event = new Event_Model();
			$UID = $_SESSION['UID'];
			$events = $event->GetAllEvents($UID);
			
			$this->Set('Events',$events);
			$this->LoadView('memheader.php');
			$this->LoadView('EventGrid.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}

	function NewEventForm()
	{
	
		$this->LoadView('EventForm.php');
		echo $this->Render(TRUE);
	
	}
	function AddNewEvent()
	{
	$UpdateCtrls=array();
	$validate = $this->Validate();
	if($validate != 'true')
	{
		array_push($UpdateCtrls, new EZYUpdate('Event-FormError',$validate,EZYCtrlType::Error));
			EZYReturn::Update($UpdateCtrls);
			return;
	}
	$event = new Event_Model();
	//print_r($_SESSION);
	$eventid=$event->GetNextID();
	$event->Set('Event_Name',$_REQUEST['EventName']);
	$event->Set('Event_SDate',$_REQUEST['EventSDate']);
	$event->Set('Event_EDate',$_REQUEST['EventEDate']);
	$event->Set('Event_Address',$_REQUEST['EventAddress']);
	$event->Set('SMSSender_ID',$_REQUEST['SmsSenderCode']);
	$event->Set('Sender_EmailID',$_REQUEST['SenderEmail']);
	$event->Set('User_ID',$_SESSION['UID']);
	$event->Set('Company_ID',$_SESSION['CompID']);
	if(isset($_REQUEST['PreRegister']))
	$event->Set('PreRegister',1);
	else 
	$event->Set('PreRegister',0);
	
	
	if(!$event->CheckDuplicate($_SESSION['CompID']))
	{
	  
	$ret=$event->Insert();
		if(!$ret)
		{
		array_push($UpdateCtrls, new EZYUpdate('Event-FormError','DBError-',EZYCtrlType::Error));
				EZYReturn::Update($UpdateCtrls);
		}
		else 
		{
		$retval = '<tr><td>'.$_REQUEST['EventName'].'</td><td>'.$_REQUEST['EventAddress'].'</td><td>'. ($_REQUEST['EventSDate']).'</td><td>'.$_REQUEST['SmsSenderCode'].'</td><td>'.$_REQUEST['SenderEmail'].'</td><td><span class="formbutton" onclick="urllocation(\'Event-OpenEvent-'.$eventid.'\');">Add Visitors</span></td></tr>';
		
		array_push($UpdateCtrls, new EZYUpdate('EventGrid',$retval,EZYCtrlType::Append));
		array_push($UpdateCtrls, new EZYUpdate('Event-AddNewEvent',$retval,EZYCtrlType::FormReset));
		array_push($UpdateCtrls, new EZYUpdate('Visitor-FormError','Event Successfully Added',EZYCtrlType::Update));
			EZYReturn::Update($UpdateCtrls);
		}
	
	}
	else
	{
		array_push($UpdateCtrls, new EZYUpdate('Event-FormError','Event Already Register',EZYCtrlType::Update));
			EZYReturn::Update($UpdateCtrls);
	}
	
	}
	
	function Validate()
	{
	$validate= new FormValidate();
	
	if(!$validate->isValidMinMaxString($_REQUEST['EventName'],3,35))
		return 'Enter Valid Event Name ';
	elseif(!$validate->Date($_REQUEST['EventSDate']))
	    return 'Not Valid Start Date';
	elseif(!$validate->Date($_REQUEST['EventEDate']))
	    return 'Not Valid End Date';
	elseif(
	(!$validate->isEmpty($_REQUEST['EventAddress']))&& 
    (!$validate->isValidMinMaxAlphaNumString($_REQUEST['EventAddress'] ,15,255)))
		return 'Not a valid address';
    elseif(
	(!$validate->isEmpty($_REQUEST['SmsSenderCode']))&&
	(!$validate->isValidMinMaxAlphaNumString($_REQUEST['SmsSenderCode'],6,6)))
		return 'Not a valid SMSID';
	elseif(
	(!$validate->isEmpty($_REQUEST['SenderEmail']))&&
	(!$validate->isValidateEmail($_REQUEST['SenderEmail'])))
		return 'Enter Valid Email Address';	
		else
		return 'true';
	}
	
	function OpenEvent($args)
	{
		$_SESSION['EventID'] = $args[0];
		$UpdateCtrls = array();
		array_push($UpdateCtrls, new EZYUpdate('','Visitor',EZYCtrlType::Location));
		EZYReturn::Update($UpdateCtrls);
	}
	
	
};

?>