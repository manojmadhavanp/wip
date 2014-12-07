<?
class EventGrid extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title',' Visitor Management system');
			$this->Set('keyword','Visitor registered, Management System');
			$this->Set('description','Manage visitor in your company, house, office.');
			$this->LoadView('header.php');
			$this->LoadView('EventGrid.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}
	function Event()
	{
	$this->LoadView('EventForm.php');
	echo $this->Render(true);
	}
	
};

?>