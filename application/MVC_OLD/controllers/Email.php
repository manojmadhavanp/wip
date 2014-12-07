<?
class Email extends EZYController
{
 function Main()
 {
    if(!$this->isDynamic())
	{    
		 $this->LoadView('EmailRegistration.php');
		 
		
		
		$this->render();
	}
 }

 
function SentRegistrationEmail($args)
	{ 
	   
	    print_r($args);
	 	$this->Set('PersonName',$args[2]);
		//$this->Set('Email',$args[1]);	
	  	$this->LoadView('EmailRegistration.php');
		echo $this->Render(TRUE);
		
		
	}
	
				
};
?>