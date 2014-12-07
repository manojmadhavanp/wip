<?
echo '<option value="0" > -- Select -- </option>';
 if(isset($data['optionval']))
  {
  if($data['optionval'])
  {
  	
  	foreach($data['optionval'] as $options)
		{
			$result = '<option value="'.$options[$data['key']].'"';
			if(isset($data['default']))
			{
			if($data['default'] == $options[$data['key']])
			$result .= ' selected="selected" ';
			}
			
			
			$result .= '>'.$options[$data['value']].'</option>';
			echo $result;
		}
	}
	else
	{
	echo '<option value="-1" selected="selected"> -- No Results, Please add -- </option>';
	}
  }
 
  
 ?>