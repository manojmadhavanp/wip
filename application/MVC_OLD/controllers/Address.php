<?
class Address extends EZYController
{
function Main()
	{
		
	}
	
	function NewAddressForm()
	{
	    $this->LoadView('Addressfrm.php');
		echo $this->Render(TRUE);
	}
		
    function AddNewAddr()
	{
	  $addr = new  Address_Model();
	  $ret=$addr->GetAllAdd();
	  if($ret)
	  return true;
	  else 
	  return false;
	}


function LoadAddress($args)
	{
		
		if(isset($args) && $args[0] != '')
		{
			$masters = new masters();
			return $masters->LoadCity($args);
		}
		
		$UpdateCtrls= array();
		$this->LoadModel('Masters.php');
		$masters= new Masters_Model();
		$ret = $masters->GetLocations();
		$this->Set('optionval',$ret);
		$this->Set('key','location_ID');
		$this->Set('value','location_Name');
		$this->LoadView('option.php');
		$locs = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('Address1','focus',EZYCtrlType::SetFocus));
		array_push($UpdateCtrls,new EZYUpdate('Location','disabled',EZYCtrlType::EnableAttribute));
		array_push($UpdateCtrls,new EZYUpdate('Location',$locs,EZYCtrlType::Update));
		
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('Country',$countries,EZYCtrlType::Update));
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$states = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('State',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('State','disabled',EZYCtrlType::DisableAttribute));
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$cities = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('City',$cities,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('City','disabled',EZYCtrlType::DisableAttribute));
		
	   	return EZYReturn::Update($UpdateCtrls);
	}
	
	};
?>