<?
class Address_Model extends EZYModel
{
function _construct()
{
$this-> tablename="visitor";
$this->tablecontroller="visitor_ID";
}

function GetAllAdd()
{
	$ret = $this->Query('*', $Query);
	if($ret)
	 return $ret;
}

function GetAdd()
{

$add= new Address_Model();
$qry='select address1 , address2 from visitor';
$ret = $add->Query('*',$qry);
echo $ret;
if(!ret)
return true ;
else
return true;

}

};
?>
