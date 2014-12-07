<?
class VerifyRegistration extends EZYController
{
function Main()
{
   if(!$this->isDynamic())
	{   
	    $this->LoadView('header.php');
		$this->LoadView('Verification.php');
		$this->LoadView('footer.php');
		$this->render();
	}
}


};
?>