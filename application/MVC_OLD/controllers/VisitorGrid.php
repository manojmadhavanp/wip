<?
class VisitorGrid extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
		
			$this->LoadView('header.php');
			$this->LoadView('footer.php');
			$this->LoadView('Visitor.php');
			$this->LoadView('VisitorGrid.php');
			$this->render();
		}
	}
	

};
?>