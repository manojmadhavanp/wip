<div class="row">
<table width="101%" border="0" cellspacing="2" cellpadding="1" id="Reg" class="webgrid">
  <tr>
  <th colspan="6" class="caption"><h3 align="center">Registration details</h3> </th>
   </tr>
  <tr>
   	<th> UID</th >
    <th>Name</th>
    <th>Company Name</th>
    <th>Contact Details</th>
    <th>Email ID</th>
    <th>Password</th>
    <th>SENDERID</th>
    <th>SMS Count</th>
  </tr>
  <tr>
    </tr>
    <?
if(isset($data['regs']))
{
if(!$data['regs'])
 echo '<tr><td colspan="6"><h1>No Registration Yet!!!</h1></td></tr>';
 else
 {
 foreach($data['regs'] as $reg)
 {
$result='<tr>';
$result.='<td>'.$reg['userreg_ID'].'</td>';
$result.='<td>'.$reg['Name'].'</td>';
$result.='<td>'.$reg['userreg_Company'].'</td>';
$result.='<td>'.$reg['userreg_MobileNo'].'</td>';
$result.='<td>'.$reg['userreg_EmailID'].'</td>';
$result.='<td>'.$reg['userreg_Password'].'</td>';
$result.='<td>'.$reg['userreg_SenderID'].'</td>';
$result.='<td>'.$reg['Sms_Count'].'</td>';
$result .= '<td><span class="formbutton" onclick="urllocation(\'Email-SentRegistrationEmail-'.$reg['userreg_ID'].'-'.$reg['userreg_EmailID'].'-'.$reg['Name'].'\');" >Verify Email</span></td>';
$result.='</tr>';
echo $result;
}
}
}
?>

</table>
