<?
class Index extends EZYController
{
	function Main()
	{
		/*if(!$this->isDynamic())
		{*/
			EZYLog::Debug('in Main');
			$this->Set('title','Craft ProjectBOX');
			$this->Set('keyword','Project Management Intranet site');
			$this->Set('description','Manage project in Craft Mumbai Office.');
			$this->LoadView('header.php');
			$this->LoadView('Index.php');
			$this->LoadView('footer.php');
			$this->render();
		/*}*/
	}
};
?>
