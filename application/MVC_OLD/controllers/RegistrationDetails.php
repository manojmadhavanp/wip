<?
class  RegistrationDetails extends EZYController
{
function Main()
{
 if(!$this->isDynamic())
 {   
 	$this->LoadModel('Registration.php');
 	 $reg = new Registration_Model();
	$regs = $reg->GetRegDetails();
	 //print_r($regs);	
	 $this->LoadView('memheader.php');
	 $this->Set('regs',$regs);
	//$this->LoadView('RegDetails.php');
	 $this->LoadView('Footer.php');
	 $this->render();
 }
}

	
/*function ShowReg()
{
$Update=array();
$reg= new Registration_Model();
$reg->Set('Event_Name',$_REQUEST['Event']);
$reg->Set('visitor_CompanyName',$_REQUEST['CompanyName']);
$reg->Set('Event_SDate',$_REQUEST['EventDate']);
$reg->Set('SMSSender_ID',$_REQUEST['SmsSenderID']);
$reg->Set('Sender_EmailID',$_REQUEST['SenderEmail']);

$ret=$reg->GetRegDetails();
	if(!$ret)
	{
	array_push($UpdateCtrls ,new EZYUpdate('RegistrationDetails-FormError','DBError',EZYCtrlType::    Error));
	EZYReturn::Update($UpdateCtrls);
	return false;
	}
	$retval ='<tr><td>'.$_REQUEST['Event'].'</td><td>'.$_REQUEST['CompanyName'].'</td><td>'.$_REQUEST['EventDate'].'</td><td>'.$_REQUEST['SmsSenderID'].'</td><td>'.$_REQUEST['SenderEmail'].'</td><td><span class="formbutton" onclick="urllocation(\'Email-SentRegistrationEmail\');">Verify Email</span></td></tr>';

}*/

};
?>