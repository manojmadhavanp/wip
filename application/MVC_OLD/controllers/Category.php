<?
class Category extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->LoadView('header.php');
		    $this->LoadView('Category.php');
			$this->LoadView('footer.php');
			$this->render();
		}
	}
	
	function ShowCategory()
	{
	 $this->LoadView('AllCategory.php');
	 $this->Render(TRUE);
	}


};
?>