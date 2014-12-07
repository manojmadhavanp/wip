<?
class AddEmployee extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title',' Visitor Management system');
			$this->Set('keyword','Visitor registered, Management System');
			$this->Set('description','Manage visitor in your company, house, office.');
			$this->LoadView('header.php');
			$this->LoadView('footer.php');
			$this->LoadView('Visitor.php');
			$this->LoadView('AddEmployee.php');
			$this->render();
		}
	}

};
?>