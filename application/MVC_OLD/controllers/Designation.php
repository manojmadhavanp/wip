<?
class  Designation extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{
            $desig = new Designation_Model();
			$desigs = $desig->GetAllDesig();
			
			$this->LoadView('header.php');
		    $this->Set('$desigs',$desigs)
			$this->LoadView('Designation.php');
			$this->LoadView('footer.php');
			$this->render();
			
		}
	}
	function NewDesignation()
	{
	$this->LoadView('Designationfrm.php');
	echo $this->Render(TRUE);
	
	}
	
	function GetDesignation()
		{
		  $desig=new Designation_Model();
		  $des=$desig->AddDesignation();
		  if($des)
		  {
		  $des='<tr><td><h1>'.$_REQUEST['designation_ID'].'</h1></td><td><h2>'.$_REQUEST['designation_Name'].'               </h2></td></tr>';
		  }
		  
		else 
		return false;
	}
	
	/*$catid = $designationval->GetDesignationCatID();
				//$qrystr= "SELECT designation_Name FROM designation where designation_CatID=1";
				if($catid == 1)
					$catowner .='<span id="designationsel_'.$designationname.'" class="category" onclick="onclickdesignation(this);">'.$designationval->GetDesignationName().'</span>';
				else if($catid == 2)
					$cattopman .='<span id="designationsel_'.$designationname.'" class="category" onclick="onclickdesignation(this);">'.$designationval->GetDesignationName().'</span>';
				else if($catid == 3)
					$catman .='<span id="designationsel_'.$designationname.'" class="category" onclick="onclickdesignation(this);">'.$designationval->GetDesignationName().'</span>';
				else if($catid == 4)
					$cattech .='<span id="designationsel_'.$designationname.'" class="category" onclick="onclickdesignation(this);">'.$designationval->GetDesignationName().'</span>';
				*/
};
?>