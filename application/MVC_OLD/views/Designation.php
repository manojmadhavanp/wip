<div class="row">
<table width="50%" height="50%" border="0" cellspacing="0" cellpadding="0" id="Designation" class="webgrid">
  <tr>
    <th colspan="5" class="caption"><h3>Designation</h3></th>
    <th width="40%" align="right" class="caption gridbutton"><div class="gridbtn button green animateslow" id="Desgination-" onclick="ShowForm('NewDesigntaion',false);"><i class=" icon add"></i>New Designation</div></th>
  </tr>
  <tr>
   <th>Owner</th>
        <th>Top Management</th>
        <th>Management</th>
        <th>Technical</th>
      </tr>
      </table>
<?
  if(isset($data['desigs']))
  {
  if(!$data['desigs'])
  
  echo '<tr><td colspan="4"><h1>Select Designation</h1></td></tr>';
  	//if(sizeof($data['desigs'])=1)
	{
  	foreach($data['desigs'] as $desig)
		{
			$result = '<tr><td><ul class="clearfix webform"><li><div class="frmitemcaption">Owner</div><input type="text" name="Owner" id="Owner" placeholder="Owner " /></li><td>';
		   $result.= '<tr><td><li><div class="frmitemcaption">TopManagement</div><input type="text" name="TopManagement" id="TopManagement" placeholder="TopManagement " /></li><td>';
		   $result .= '<tr><td><li><div class="frmitemcaption">Management</div><input type="text" name="Management" id="Management" placeholder="Management " /></li><td>';
			$result .= '<tr><td><li><div class="frmitemcaption">Technical</div><input type="text" name="Technical" id="Technical" placeholder="Technical " /></li><td>';
			$result .= '</tr>';
			echo $result;
		}
	}
  }
  ?>
