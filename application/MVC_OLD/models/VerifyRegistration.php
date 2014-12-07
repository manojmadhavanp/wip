<?
class VerifyRegistration_Model extends EZYModel
{
 
 function __construct()
 {
   $this->tablename="userreg";
   $this->tablecontroller="userreg_ID";
 }
function GetAllEmail()
{
return $this->Query();
}

}
?>

