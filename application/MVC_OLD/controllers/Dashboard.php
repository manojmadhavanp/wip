<?
class Dashboard extends EZYController{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title','Dashboard');
			$this->LoadView('memheader.php');
			$this->LoadView('Dashboard.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}
};
?>