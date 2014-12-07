   <div class="row">                           
<table width="100%"  border="0" cellpadding="0" cellspacing="0" id="VisitorGrid" class ="webgrid">
  <tr>
    <th  colspan="5" class="caption"><h3>Visitor Details</h3></th>
    <th colspan="1" class="caption"> <div class="button green animateslow" id="Events-" onclick="ShowForm('VisitorForm','Visitor-LoadVisitorForm');"><i class=" icon add"></i>New Visitor</div></td>
    </tr>
  <tr>
    <th>No</th>
    <th> Visitor Name</th>
    <th>Contact Details</th>
    <th>Priority</th>
    <th>Address</th>
    <th>Attended by</th>
  </tr>
 
   <?
  if(isset($data['visits']))
  {
   if(!$data['visits'])
  echo '<tr><td colspan="6"><h1>No Visitors Yet!!!</h1></td></tr>';
  else
  {
  	$i=1;
  	foreach($data['visits'] as $visit)
		{
			$result = '<tr><td>'.$i++.'</td>';
			$result .= '<td>'.$visit['visitor_prefix'].' '.$visit['visitor_FName'].' '.$visit['visitor_MName'].' '.$visit['visitor_LName'].' '.$visit['visitor_Designation'].'</td>';
			$result .= '<td>'.$visit['visitor_Mobile'].' '.$visit['visitor_Email'].'</td>';
			$result .= '<td>'.$visit['visitor_Priority'].'</td>';
			$result .= '<td>'. urldecode($visit['Address1']).' '.urldecode($visit['Address2']).' '.$visit['visitor_Landmark'].' '.$visit['Pin_no'].' '.$visit['visitor_Location'].' '.$visit['visitor_Country'].' '.$visit['visitor_State'].' '.$visit['visitor_City'].'</td>';
			$result .= '<td>'.$visit['visitor_Attendedby'].'</td>';
			$result .= '</tr>';
			echo $result;
			
		}
 }//else
  }
  ?>
</table>
</div>
<div id="VisitorForm" class="formdlg" style="width:775px; height:auto;">

<?
$VisitorFrm = new Visitor();
$VisitorFrm->NewVisitorForm();
?>
</div>

<div id="Addressfrm" class="formdlg" style="width:400px; height:auto;">

<?
$Address = new Address();
$Address->NewAddressForm();
?>
</div>
<?
$loc = new Masters();
?>
<div id="Locationfrm" class="formdlg" style="width:400px; height:auto;">
<?
$loc->LocationForm();
?>
</div>

<div id="Cityfrm" class="formdlg" style="width:400px; height:auto;">
<?
$loc->CityForm();
?>
</div>

<div id="Statefrm" class="formdlg" style="width:400px; height:auto;">
<?
$loc->StateForm();
?>
</div>

<div id="Countryfrm" class="formdlg" style="width:400px; height:auto;">
<?
$loc->CountryForm();
?>
</div>


			