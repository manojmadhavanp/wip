<div class="row">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="EventGrid" class="webgrid">
  <tr>
    <th colspan="5" class="caption"><h3>Event</h3> </th>
    <th align="right" class="caption gridbutton"><div class="gridbtn button green animateslow" id="Events-" onclick="ShowForm('EventForm',false);"><i class=" icon add"></i>New Event</div></th>
    </tr>
  <tr>
    <th >Event</th>
    <th  >Address</th>
    <th >Date</th>
    <th >Sender ID</th>
    <th >Sender Email</th>
    <th></th>
  </tr>
  <?
  if(isset($data['Events']))
  {
  	foreach($data['Events'] as $event)
		{
			$result = '<tr>';
			$result .= '<td>'.$event['Event_Name'].'</td>';
			$result .= '<td>'.$event['Event_Address'].'</td>';
			$result .= '<td>'.$event['Event_SDate'].'</td>';
			$result .= '<td>'.$event['SMSSender_ID'].'</td>';
			$result .= '<td>'.$event['Sender_EmailID'].'</td>';
			$result .= '<td><span class="formbutton" onclick="urllocation(\'Events-OpenEvent-'.$event['EventID'].'\');">Add Visitors</span></td>';
			$result .= '</tr>';
			echo $result;
		}

  }
  ?>
</table>
</div>
<div id="EventForm" class="formdlg" style="width:400px;">
<?
$EventFrm = new Events();
$EventFrm->NewEventForm();
?>
</div>
