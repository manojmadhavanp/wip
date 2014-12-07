<?php
class EZYProduct{
	var $ID = -1;
	var $Name = '';
	var $Desc = '';
	var $Slug = '';
	var $Category = '';
	var $Price = '';
	
	function GetID(){
		return $ID;
	}
	function GetName(){
		return $Name;
	}
	function GetDescription(){
		return $Desc;
	}
	function GetSlug(){
		return $Slug;
	}
	function GetCategories(){
		return $Category;
	}
	function GetPrice(){
	}
	function SetID($ID){
	}
	
};
?>