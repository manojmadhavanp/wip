<table width="100%" border="0" cellpadding="0" cellspacing="0" class="appform">
  <tr>
    <th ><h1>Address</h1></th>
    <th width="32px"><div class="iconbtn icon close" onclick="HideAddressForm('Addressfrm'); "></div></th>
    </tr>
    <tr>
    <td ><div id="Addressfrm-FormError" class="frmhelper"></div></td>
    </tr>
    <tr>
    <td><form name="Addressfrm-AddAddress" id="Addressfrm-AddAddress" method="post" action="" onsubmit="return false;">

<ul class="clearfix webform">

<li><div class="frmitemcaption">Address1</div><div class="frmitem">
    <input type="text" name="Address1" id="Address1" /></div></li>
  
<li><div class="frmitemcaption">Address2</div><div class="frmitem">
  <input type="text" name="Address2" id="Address2" /></div></li>
  
  <li><div class="frmitemcaption">Landmark</div><div class="frmitem">
 <input type="text" name="Landmark" id="Landmark" /></div></li>
  
   <li><div class="frmitemcaption">Pin no</div><div class="frmitem">
  <input type="text" name="Pinno" id="Pinno" /></div></li>
  
<li><div class="frmitemcaption">Location</div><div class="frmitems" >
            <select class="fit" name="Location" id="Location" onchange="LoadComboData(this,'Masters-LoadCity');" ></select>
         <span class="addbtn" onclick="ShowForm('Locationfrm','Masters-LoadLocCountry');"> 
			<i class="icon add"></i></span>
                    </div> </li>
                    
 <li><div class="frmitemcaption">Country</div><div class="frmitems">
            <select class="fit" name="Country" id="Country" onchange="LoadComboData(this,'Masters-LoadStates');"></select><span class="addbtn" onclick="ShowForm('Countryfrm',false);" ><i class="icon add"></i></span>
             </div></li>
 <li><div class="frmitemcaption">State</div><div class="frmitems">
            <select class="fit" name="State" id="State" onchange="LoadComboData(this,'Masters-LoadCities');" disabled="disabled" ></select>
             <span class="addbtn" onclick="ShowForm('Statefrm','Masters-LoadStateCountry');"><i class="icon add"></i></span>
            </div></li>
<li><div class="frmitemcaption">City</div><div class="frmitems ">
            <select class="fit" name="City" id="City" onchange="LoadComboData(this,'Masters-LoadLocations');" disabled="disabled" ></select>
            <span class="addbtn" onclick="ShowForm('Cityfrm','Masters-LoadCityCountry');"><i class="icon add"></i></span>
             </div></li>
            
     </ul>   
   </form>
    </td>
  </tr>
</table>
