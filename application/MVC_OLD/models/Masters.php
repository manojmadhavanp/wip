                                                                                                  <?                                                                           
class Masters_Model extends EZYModel
{
function __construct()
{
	$this->tablename="location";
	$this->tablecontrol="location_ID";
	
}

function GetAllLoc($locname)
{
	$ret= $this->Query();
	if($ret)
	return true;
}

function GetAllCity($cityname)
{
	$ret= $this->Query();
	if($ret)
	return true;
}
function GetAllCountry()
{
	$ret= $this->Query();
	if($ret)
	return true;
}
function GetAllState($statename)
{
	$ret=$this->Query();
	if($ret)
	return true;
}

function AddLocation($locationid)
{
	$loc= new Masters_Model();
	$loc->Set('location_Name',$_REQUEST['LocationName']);
	
	$ret=$loc->Insert();
	if($ret)
	return true;
	else 
	return false;

}

function GetLocations($cityID=0)
{
	$Query = 'SELECT * FROM location';
	if($cityID)
	$Query .= ' WHERE location_CityID='.$cityID;
	//EZYLog::Debug($Query);
	$ret= $this->Query('*', $Query);	
	if($ret)
		return $ret;
	else
		return false;	
}
function GetMastersByLocationID($locationID)
{
	$Query = 'SELECT *
	FROM location
	LEFT OUTER JOIN city ON location_CityID = city_ID
	LEFT OUTER JOIN state ON city_StateID = state_ID
	LEFT OUTER JOIN country ON state_countryID = country_ID
	WHERE location_ID ='.$locationID;
	$ret= $this->Query('*', $Query);	
	if($ret)
		return $ret;
	else
		return false;	
}

function LoadLocations($CityID)
{
$Query = 'SELECT * FROM  location';
	if($CityID)
	$Query .= ' WHERE location_CityID='.$CityID;
	$ret= $this->Query('*', $Query);	
	
	if($ret)
		return $ret;
	else
	 return false;
}
function AddCitys($cityID)
	{
	$city= new Masters_Model();
	$this->Set('city_Name',$_REQUEST['City']);
	$ret=$city->Insert();
	if($ret)
	return true ;
	else 
	return false;
	}
function LoadCity($StateID)
	{
	$Query = 'SELECT * FROM city';
	if($StateID)
	$Query .= ' WHERE city_StateID='.$StateID;
	$ret= $this->Query('*', $Query);	
	
	if($ret)
		return $ret;
	else
	 return false;
	 }	
function AddStates($StateID)
	{
	$state= new Masters_Model();
    $this->Set('State_Name',$_REQUEST['Statename']);
	$ret=$state->Insert();
	if($ret)
	return true;
	else 
	return false;
	}
function LoadState($CountryID)
	{
	$Query = 'SELECT * FROM state';
	if($CountryID)
	$Query .= ' WHERE state_CountryID='.$CountryID;

	$ret= $this->Query('*', $Query);	
	
	if($ret)
		return $ret;
	else
	 return false;
   }		  
function AddCountrys()
	{
	$country= new Masters_Model();
    $ret=$country->AddNewCountry();
	if($ret)
	return true;
	else 
	return false;
	}
function LoadCountry()
	{
	$Query = 'SELECT * FROM country';
	$ret= $this->Query('*', $Query);	
	if($ret)
		return $ret;
	else
	 return false;
   }		  
function checkduplicate($countryid)
{
$Qry='Select country_ID from country where country_Name ="'.$this->Get('country_Name').'" and 
      country_ID="'.$countryid.'"' ;
	  
$country = new Masters_Model();
	$ret = $country->Query('*',$Qry);

	if($ret)
	{
	return true;
	}
	else
	return false;
	 
}
};
?>