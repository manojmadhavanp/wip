<?php
class PageNotFound extends EZYController{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title','Error: Page not found');
			$this->Set('keyword','Error: Page not found');
			$this->Set('description','Error: Page not found');
			$this->LoadView('header.php');
			$this->LoadView('pagenotfound.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}
}
?>