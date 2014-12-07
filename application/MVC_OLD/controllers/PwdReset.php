<?
class PwdReset extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title','Registor to visitor Management system');
			$this->Set('keyword','Registration, Management System');
			$this->Set('description','Manage visitor in your company, house, office.');
			$this->LoadView('header.php');
			$this->LoadView('PwdReset.php');
			//$this->LoadView('User.php');
			$this->LoadView('footer.php');
			$this->render();
		}
    }
};

?>