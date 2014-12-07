<?
class Admin extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
			$this->Set('title','Login to visitor Management system');
			$this->Set('keyword','Visitor, Management System');
			$this->Set('description','Manage visitor in your company, house, office.');
			$this->LoadView('adminheader.php');
			$this->LoadModel('Registration.php');
		    $reg = new Registration_Model();
			$regs = $reg->GetRegDetails();
		    $this->Set('regs',$regs);
			$this->LoadView('Reg.php');
			$this->LoadView('footer.php');
		    $this->render();
		}
	}
	function User()
	{
	        $this->LoadView('adminheader.php');
			$this->Set('regs',$reg);
			
			$this->LoadView('footer.php');
	}
	function UserList()
	{
	
		$this->LoadView('Reg.php');
		echo $this->Render(TRUE);
	}
};
?>