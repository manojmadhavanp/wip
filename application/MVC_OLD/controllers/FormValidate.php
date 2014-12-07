<?
class FormValidate extends EZYValidate
{
	function ValidateCompanyName($value)
	{
		if(!$this->isValidWord($value))
		return false;
		elseif(strlen($value)<3)
	    return false;
		else
		return true;
	}
	function ValidateString($value)
	{
		if(!$this->isValidWord($value))
		return false;
		elseif(strlen($value)<3)
	    return false;
		else
		return true;
	}
	function isEmpty($value)
	{
	if(strlen($value)==0)
		return true;
	else
		return false;
	}
	/*function ValidateEmail($value)
	{
		if(!filter_var($value,FILTER_VALIDATE_EMAIL))
		return false;
		else 
		return true;
	}*/
	
	function isValidateMobileNo($value)
	{
	if(!$this->isValidNumber($value))
	return false;
	elseif(strlen($value)!=10)
	return false;
	else
	return true;
	}
	function isValidateMinMaxNumber($value,$min,$max)
	{
	if(!$this->isValidNumber($value))
	return false;
	elseif(strlen($value)<$min)
	return false;
	elseif(strlen($value)>$max)
	return false;
	elseif(strlen($value)!=8)
	return false;
	else
	return true;
	}
	function isValidMinMaxString($value, $min, $max)
	{
	if(!$this->isValidString($value))
	return false;
	elseif(strlen($value)< $min)
	return false;
	elseif(strlen($value) > $max)
	return false;
	else 
	return true;	
	}
	function isValidMinMaxAlphaNumString($value, $min, $max)
	{
	if(!$this->isValidAlpaNumString($value))
	return false;
	elseif(strlen($value)< $min)
	return false;
	elseif(strlen($value) > $max)
	return false;
	else 
	return true;	
	}
	function isValidPassword($value,$min,$max)
	{
		
	//echo "/[a-zA-Z][a-zA-Z0-9@;:!$*|.-_]{".$min.",".$max."}";
		if(!(preg_match("/[a-zA-Z][a-zA-Z0-9@;:!*|.-_]{".$min.",".$max."}$/",$value)))
		{	
			return false;
		}
		else
		return true;	
		
	}

	
	function TermAccepted($value,$expectedvalue)
	{
	if($value == $expectedvalue)
		return true;
	else 
		return false;
	}
	function Date($value)
	{
	if(strlen($value)<5)
	return false;
	elseif(strlen($value)>16)
	return false;
	else
	return true;
	}

	function isValidateEmail($value)
	{
	    $str = $value;
		$at="@";
		$dot=".";
		$lat=strpos($value, $at);
		$lstr=strlen($value);
		$ldot=strpos($value, $dot);
		if($lstr < 3)
			return false;
		elseif(strpos($value,$at)==false)
		  return false;
		 elseif ((strpos($value,$at)==false)||(strpos($value,$at)==0) || (strpos($value,$at)==$lstr))
	   return false;
		elseif((strpos($value,$dot)==false)||(strpos($value,$dot)==0) || (strpos($value,$dot)==$lstr))	
		 return false;
		elseif (strpos($value,$at,$lat+1)!=false)
		 return false;
		 elseif ((strpos($value,$lat-1,$lat)==$dot)||(strpos($value,$lat+1,$lat+2)==$dot))
		     return false;
		elseif (strpos($value,$dot,($lat+2))==false)
			return false;
		elseif (strpos($value," ")!=false)
		  return false;
		else
 		 return true;	
 }			
	  
	
	
	
	
	
};
?>