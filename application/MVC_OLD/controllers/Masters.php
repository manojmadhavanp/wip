<?
class Masters extends EZYController
{
function Main()
	{
		if(!$this->isDynamic())
		{  
			$this->Set('title','Login to visitor Management system');
			$this->Set('keyword','Visitor, Management System');
			$this->Set('description','Manage visitor in your company, house, office.');
			$add = new Masters_Model();
			$addr= $add->GetAllAddr();
			$this->Set('addr',$addr);
			$country=$add->GetAllCountry();
			$this->Set('country',$country);
			$this->LoadView('memheader.php');
			$this->LoadView('Location.php');
			$this->LoadView('Country.php');
			$this->LoadView('State.php');
			$this->LoadView('City.php');
            $this->LoadView('footer.php');
			$this->render();
		}
	}
	
		
	function LocationForm()
	{
	
		$this->LoadView('Location.php');
		echo $this->Render(TRUE);
	}
	function CityForm()
	{
	
		$this->LoadView('City.php');
		echo $this->Render(TRUE);
	}
	function StateForm()
	{
	
		$this->LoadView('State.php');
		echo $this->Render(TRUE);
	}
	function CountryForm()
	{
	
		$this->LoadView('Country.php');
		echo $this->Render(TRUE);
	}
	
	
function AddLoc()
	{
	$addr= new Masters_Model();
	
    $ret=$addr->AddNewLocations();
	if($ret)
	return true;
	else
	return false;
	}
function AddCity()
	{
	$addr = new Masters_Model();
	$ret=$addr->AddCitys($Cityid);
	if($ret)
	return true;
	else
	return false;
	}
function AddState()
	{
	$addr= new Masters_Model();
	$ret=$addr->AddStates($StateID);
	if($ret)
	return true;
	else 
	return false;
	}
function AddCountry()
	{
	$count= new Masters_Model();
	$ret=$count->AddCountrys($CountryID);
	if($ret)
	return true;
	else 
	return false;
	}
	
	function LoadCity($args)
	{
	$UpdateCtrls= array();
	$locationid=$args[0];
	$masters = new Masters_model();
	$ret = $masters->GetMastersByLocationID($locationid);	
	$CityID = $ret[0]['location_CityID'];
	$StateID = $ret[0]['city_StateID'];
	$CountryID = $ret[0]['state_CountryID'];

		$ret = $masters->GetLocations();
		$this->Set('optionval',$ret);
		$this->Set('key','location_ID');
		$this->Set('value','location_Name');
		$this->Set('default',$locationid);
		$this->LoadView('option.php');
		$locs = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('Location',$locs,EZYCtrlType::Update));
		


	$ret = $masters->LoadCountry();
	$this->Set('optionval',$ret);
	$this->Set('key','country_ID');
	$this->Set('value','country_Name');
	$this->Set('default',$CountryID);
	$this->LoadView('option.php');
	$countries = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('Country',$countries,EZYCtrlType::Update));
	
	$ret = $masters->LoadState($CountryID);
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->Set('default',$StateID);
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('State',$states,EZYCtrlType::Update));
		
	$ret = $masters->LoadCity($StateID);
	$this->Set('optionval',$ret);
	$this->Set('key','city_ID');
	$this->Set('value','city_Name');
	$this->Set('default',$CityID);
	$this->LoadView('option.php');
	$cities = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('City',$cities,EZYCtrlType::Update));
    return EZYReturn::Update($UpdateCtrls);
	}
	
	function LoadStates($args)
	{
	$UpdateCtrls= array();
	$CountryID=$args[0];
	$masters = new Masters_model();
	$ret = $masters->LoadState($CountryID);
	
	
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$location = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('Location','disabled',EZYCtrlType::DisableAttribute));
		array_push($UpdateCtrls,new EZYUpdate('Location',$location,EZYCtrlType::Update));
		
		if($ret)
		array_push($UpdateCtrls,new EZYUpdate('State','disabled',EZYCtrlType::EnableAttribute));
		else
		array_push($UpdateCtrls,new EZYUpdate('State','disabled',EZYCtrlType::DisableAttribute));
			
		array_push($UpdateCtrls,new EZYUpdate('State',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('State','focus',EZYCtrlType::SetFocus));
		
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$cities = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('City',$cities,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('City','disabled',EZYCtrlType::DisableAttribute));
		array_push($UpdateCtrls,new EZYUpdate('City',$this->GetAddress(),EZYCtrlType::Update));
		
		return EZYReturn::Update($UpdateCtrls);
	
	}
	
	function LoadCities($args)
	{
	$UpdateCtrls= array();
	$StateID=$args[0];
	$masters = new Masters_model();
	$ret = $masters->LoadCity($StateID);
	$this->Set('optionval',$ret);
	$this->Set('key','city_ID');
	$this->Set('value','city_Name');
	$this->LoadView('option.php');
	$cities = $this->Render(TRUE);
	
	array_push($UpdateCtrls,new EZYUpdate('City','disabled',EZYCtrlType::EnableAttribute));
	array_push($UpdateCtrls,new EZYUpdate('City',$cities,EZYCtrlType::Update));
	array_push($UpdateCtrls,new EZYUpdate('City','focus',EZYCtrlType::SetFocus));
	EZYReturn::Update($UpdateCtrls);
	}
	
	
	function LoadLocations($args)
	{
	$UpdateCtrls= array();
	$CityID=$args[0];
	$masters = new Masters_model();
	$ret = $masters->LoadLocations($CityID);
	$this->Set('optionval',$ret);
	$this->Set('key','location_ID');
	$this->Set('value','location_Name');
	$this->LoadView('option.php');
	$locations = $this->Render(TRUE);
	
	
	if($ret)
	array_push($UpdateCtrls,new EZYUpdate('Location','disabled',EZYCtrlType::EnableAttribute));
	else
	array_push($UpdateCtrls,new EZYUpdate('Location','disabled',EZYCtrlType::DisableAttribute));
	
	array_push($UpdateCtrls,new EZYUpdate('Location',$locations,EZYCtrlType::Update));
	array_push($UpdateCtrls,new EZYUpdate('Location','focus',EZYCtrlType::SetFocus));
	EZYReturn::Update($UpdateCtrls);
	}
	
function LoadLocCountry()
	{ 
	 	$UpdateCtrls= array();
		$masters = new Masters_model();
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('LCountry',$countries,EZYCtrlType::Update));
		 
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$states = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('LState',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('LState','disabled',EZYCtrlType::DisableAttribute));
		
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$cities = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('LCity',$cities,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('LCity','disabled',EZYCtrlType::DisableAttribute));
		EZYReturn::Update($UpdateCtrls);
		
		
	}
	
	
	function LoadStateCountry()
	{ 
	 
		$UpdateCtrls= array();
		$masters = new Masters_model();
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('SCountry',$countries,EZYCtrlType::Update));
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$states = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('StateName',$states,EZYCtrlType::Update));
		EZYReturn::Update($UpdateCtrls);
		
	}	
	function StateCountry()
	{
	    $UpdateCtrls= array();
		$masters = new Masters_model();
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('SCountry',$countries,EZYCtrlType::Update));
		EZYReturn::Update($UpdateCtrls);
	}
	function CityState($args)
	{
	$UpdateCtrls= array();
	$CountryID=$args[0];
	$masters = new Masters_model();
	
	$ret = $masters->LoadState($CountryID);
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	
	array_push($UpdateCtrls,new EZYUpdate('CState',$states,EZYCtrlType::Update));
	return EZYReturn::Update($UpdateCtrls);
	
	}	
	
function LoadCityCountry()
	{ 
	 	$UpdateCtrls= array();
		$masters = new Masters_model();
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('CCountry',$countries,EZYCtrlType::Update));
		
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$states = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('CState',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('CState','disabled',EZYCtrlType::DisableAttribute));
		EZYReturn::Update($UpdateCtrls);
			
	}
	
	 	
	function LoadLocState()
	{ 
		$UpdateCtrls= array();
		$masters = new Masters_model();
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('SCountry',$countries,EZYCtrlType::Update));
		EZYReturn::Update($UpdateCtrls);

	}
	
	function LoadCityState()
	{ 
		$UpdateCtrls= array();
		$masters = new Masters_model();
		
		$ret = $masters->LoadCountry();
		$this->Set('optionval',$ret);
		$this->Set('key','country_ID');
		$this->Set('value','country_Name');
		$this->LoadView('option.php');
		$countries = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('CCountry',$countries,EZYCtrlType::Update));
		
		$this->Set('optionval',$ret);
		$this->LoadView('option.php');
		$states = $this->Render(TRUE);
		
		array_push($UpdateCtrls,new EZYUpdate('CState',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('CState','disabled',EZYCtrlType::DisableAttribute));
		
		EZYReturn::Update($UpdateCtrls);
	}
	
function NewLoadStates($args)
	{
	$UpdateCtrls= array();
	$CountryID=$args[0];
	$masters = new Masters_model();
	
	$ret = $masters->LoadState($CountryID);
	
	
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	
		$this->Set('optionval',NULL);
		$this->LoadView('option.php');
		$cities = $this->Render(TRUE);
		array_push($UpdateCtrls,new EZYUpdate('LCity',$cities,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('LCity','disabled',EZYCtrlType::DisableAttribute));	
		
		
		if($ret)
		array_push($UpdateCtrls,new EZYUpdate('LState','disabled',EZYCtrlType::EnableAttribute));
		else
		array_push($UpdateCtrls,new EZYUpdate('LState','disabled',EZYCtrlType::DisableAttribute));
			
		array_push($UpdateCtrls,new EZYUpdate('LState',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('LState','focus',EZYCtrlType::SetFocus));
		return EZYReturn::Update($UpdateCtrls);
	}
	
function NewLoadCityStates($args)
	{
	$UpdateCtrls= array();
	$CountryID=$args[0];
	$masters = new Masters_model();
	
	$ret = $masters->LoadState($CountryID);
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	
		if($ret)
		array_push($UpdateCtrls,new EZYUpdate('CState','disabled',EZYCtrlType::EnableAttribute));
		else
		array_push($UpdateCtrls,new EZYUpdate('CState','disabled',EZYCtrlType::DisableAttribute));
			
		array_push($UpdateCtrls,new EZYUpdate('CState',$states,EZYCtrlType::Update));
		array_push($UpdateCtrls,new EZYUpdate('CState','focus',EZYCtrlType::SetFocus));
		return EZYReturn::Update($UpdateCtrls);
	}

function NewLoadCities($args)
{
	$UpdateCtrls= array();
	$StateID=$args[0];
	$masters = new Masters_model();
	$ret = $masters->LoadCity($StateID);
	$this->Set('optionval',$ret);
	$this->Set('key','city_ID');
	$this->Set('value','city_Name');
	$this->LoadView('option.php');
	$cities = $this->Render(TRUE);
	
	array_push($UpdateCtrls,new EZYUpdate('LCity','disabled',EZYCtrlType::EnableAttribute));
	array_push($UpdateCtrls,new EZYUpdate('LCity',$cities,EZYCtrlType::Update));
	array_push($UpdateCtrls,new EZYUpdate('LCity','focus',EZYCtrlType::SetFocus));
	
	EZYReturn::Update($UpdateCtrls);
	}

function AddNewCountry()
{
	$UpdateCtrls=array();
	$country = new Masters_Model();
	$country->TableName('country');
	$country->TableController('country_ID');
	$country->Set('country_Name',$_REQUEST['CountryName']);
	$ret=$country->Insert();
	$CountID= $ret;
	if(!$ret)
	{ 
		array_push($UpdateCtrls,new EZYUpdate('Country-Formerror','DBError',EZYCtrlType::Error));
	}
	else
	{
	array_push($UpdateCtrls,new EZYUpdate('Country-Formerror','Inserted Sucessfully',EZYCtrlType::Error));
	array_push($UpdateCtrls,new EZYUpdate('CountryName',$country,EZYCtrlType::Update));
	array_push($UpdateCtrls,new EZYUpdate('CountryName','focus',EZYCtrlType::SetFocus));
	}
	
	$rtr = $country->LoadCountry();
	$this->Set('optionval',$rtr);
	$this->Set('key','country_ID');
	$this->Set('value','country_Name');
	$this->Set('default',$CountID);
	$this->LoadView('option.php');
	$countries = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('Country',$countries,EZYCtrlType::Update));
	return EZYReturn::Update($UpdateCtrls);
}

function AddNewState()
{
$UpdateCtrls=array();
$state= new Masters_Model();
$state->Tablename('state');
$state->Tablecontroller('state_ID');
$state->Set('state_Name',$_REQUEST['StateName']);
$state->Set('state_CountryID',$_REQUEST['SCountry']);
$ret= $state->Insert();

$CID= $ret;
	if(!$ret)
	{
	array_push($UpdateCtrls, new EZYUpdate('State-FormError','DBError',EZYCtrlType::Error));
	}
	else
	{
	array_push($UpdateCtrls,new EZYUpdate('State-FormError','Inserted Sucessfully',EZYCtrlType::Error));
	array_push($UpdateCtrls,new EZYUpdate('State',$state,EZYCtrlType::Update));
	}

	$CountryID = $_REQUEST['SCountry'];
	
	$rtr = $state->LoadState($CountryID);
	$this->Set('optionval',$rtr);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->Set('default',$CID);
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('LState',$states,EZYCtrlType::Update));
	
	$ret = $state->LoadCountry();
	$this->Set('optionval',$ret);
	$this->Set('key','country_ID');
	$this->Set('value','country_Name');
	$this->Set('default',$CountryID);
	$this->LoadView('option.php');
	$countries = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('LCountry',$countries,EZYCtrlType::Update));
	
	return EZYReturn::Update($UpdateCtrls);
}

function AddNewLocation()
{
$UpdateCtrls=array();
$location= new Masters_Model();
$location->Tablename('location');
$location->Tablecontroller('location_ID');
$location->Set('location_Name',$_REQUEST['LocationName']);
$location->Set('location_CityID',$_REQUEST['LCity']);
$ret= $location->Insert();
$locID= $ret;
    
if(!$ret)
 {
   array_push($UpdateCtrls, new EZYUpdate('Locationfrm-FormError','DBError',EZYCtrlType::Error));
 }
  else
  {
  array_push($UpdateCtrls,new EZYUpdate('Locationfrm-FormError','Inserted Sucessfully',EZYCtrlType::Error));
   array_push($UpdateCtrls,new EZYUpdate('Location',$location,EZYCtrlType::Update));
  }
	$rtr= $location->GetLocations();
	$this->Set('optionval',$rtr);
	$this->Set('key','location_ID');
	$this->Set('value','location_Name');
	$this->Set('default',$locID);
	$this->LoadView('option.php');
	$locations = $this->Render(TRUE); 
	array_push($UpdateCtrls,new EZYUpdate('Location',$locations,EZYCtrlType::Update));
 
    $CityID = $_REQUEST['LCity'];
	$StateID = $_REQUEST['LState'];
	$CountryID = $_REQUEST['LCountry'];
	
	$ret = $location->LoadCountry();
	$this->Set('optionval',$ret);
	$this->Set('key','country_ID');
	$this->Set('value','country_Name');
	$this->Set('default',$CountryID);
	$this->LoadView('option.php');
	$countries = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('Country',$countries,EZYCtrlType::Update));
	
	
	$ret = $location->LoadState($CountryID);
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->Set('default',$StateID);
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('State',$states,EZYCtrlType::Update));
		
	$ret = $location->LoadCity($StateID);
	$this->Set('optionval',$ret);
	$this->Set('key','city_ID');
	$this->Set('value','city_Name');
	$this->Set('default',$CityID);
	$this->LoadView('option.php');
	$cities = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('City',$cities,EZYCtrlType::Update));
	return EZYReturn::Update($UpdateCtrls);
}

function AddNewCity()
{
$UpdateCtrls=array();
$City= new Masters_Model();
$City->Tablename('City');
$City->Tablecontroller('City_ID');
$City->Set('city_Name',$_REQUEST['CityName']);
$City->Set('city_StateID',$_REQUEST['CState']);
$ret= $City->Insert();
$SID=$ret;	
	
	if(!$ret)
	{
	array_push($UpdateCtrls, new EZYUpdate('City-FormError','DBError',EZYCtrlType::Error));
	}
	else
	{
	array_push($UpdateCtrls,new EZYUpdate('City-FormError','Inserted Sucessfully',EZYCtrlType::Error));
	array_push($UpdateCtrls,new EZYUpdate('City',$City,EZYCtrlType::Update));
	}
	
	$StateID = $_REQUEST['CState'];
	$CountryID = $_REQUEST['CCountry'];
	
	$rtr = $City->LoadCity($StateID);
	$this->Set('optionval',$rtr);
	$this->Set('key','city_ID');
	$this->Set('value','city_Name');
	$this->Set('default',$SID);
	$this->LoadView('option.php');
	$cities = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('City',$cities,EZYCtrlType::Update));
	
	$ret = $City->LoadCountry();
	$this->Set('optionval',$ret);
	$this->Set('key','country_ID');
	$this->Set('value','country_Name');
	$this->Set('default',$CountryID);
	$this->LoadView('option.php');
	$countries = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('CCountry',$countries,EZYCtrlType::Update));
	
	
	$ret = $City->LoadState($CountryID);
	$this->Set('optionval',$ret);
	$this->Set('key','state_ID');
	$this->Set('value','state_Name');
	$this->Set('default',$StateID);
	$this->LoadView('option.php');
	$states = $this->Render(TRUE);
	array_push($UpdateCtrls,new EZYUpdate('CState',$states,EZYCtrlType::Update));
	return EZYReturn::Update($UpdateCtrls);
	
}


};
?> 