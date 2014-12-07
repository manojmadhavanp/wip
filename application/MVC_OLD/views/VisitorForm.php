<table width="100%" border="0" cellpadding="0" cellspacing="0" class="appform">
  <tr>
    <th ><h3>Visitor</h3></th>
 <th width="32px"><div class="iconbtn icon close" onclick="HideForm('VisitorForm');"></div></th>
  </tr>
   <tr>
    <td colspan="2"><div id="Visitor-FormError" class="frmhelper"></div></td>
  </tr>
  <tr>
    <td  colspan="2"><form name="Visitor-AddNewVisitor" id="Visitor-AddNewVisitor" method="post" action="" onsubmit="return false;">

<ul class="clearfix webform">
<li class="row"><div class="frmitemcaption">Visitor Name<span class="imp">*</span></div><div class="frmitems">
 <select name="prefixer" id="prefixer">
                <option value="Mr." selected="selected">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Dr.">Dr.</option>
                <option value="Prof.">Prof.</option>
                <option value="Captain.">Captain.</option>
                <option value="Gen.">Gen.</option>
                 </select>
               <input name="FName" type ="text" id="FName" size="25"  placeholder="First Name" tabindex="1"/>
               <input name="MName" type ="text" id="MName" size="25" placeholder="Middle Name" tabindex="2"/>
               <input name="LName" type ="text" id="LName" size="25" placeholder="Last Name" tabindex="3"/>
</div></li>
<li ><div class="frmitemcaption">Company's Name<span class="imp">*</span></div><div class="frmitem">
        <input type="text" name="CompanyName" id="CompanyName" placeholder="Visitor's CompanyName"tabindex="4"/></div></li>     
           
 <li><div class="frmitemcaption">Designation<span class="imp">*</span></div><div class="frmitem">
   <input type="text" name="Designation"  class="FormCtrl" id="Designation" placeholder="Visitor Designation" />
 </div>
 </li>
       
          
          
                 <li><div class="frmitemcaption">Priority</div><div class="frmitem">
                   <select name="Priority" id="Priority" placeholder="Priority">
                     <option value="0" selected="selected">Low</option>
                     <option value="1">Medium</option>
                     <option value="2">High</option>
                   </select>
                 </div>
          </li>
                
       <li><div class="frmitemcaption">Mobile No</div>
   <div class="frmitem">
        <input type="text" name="Mobile" id="Mobile" placeholder="Visitor Mobile No"/></div></li>
                       
                       
     <li><div class="frmitemcaption">Email</div>
    <div class="frmitem">
        <input type="text" name="Email" id="Email" placeholder="Visitor Emaild ID"/></div></li>    
        <li><div class="frmitemcaption">Landline</div><div class="frmitems">
        <input name="stdcode" type="text" id="stdcode" size="4" maxlength="5" placeholder="Code"/>
        <input name="Telephone" type="text" id="Telephone" size="18" maxlength="10" placeholder="Phone No"/>
        <input name="telexts" type="text" id="telexts" size="4" maxlength="5" placeholder="Ext"/>
        </div></li>
        
         <li><div class="frmitemcaption">Website</div>
    <div class="frmitem">
        <input type="text" name="Website" id="Website" placeholder="Website"/></div></li>         
       
         <li><div class="frmitemcaption">Fax no</div><div class="frmitems">
        <input name="Faxcode" type="text" id="Faxcode" size="4" maxlength="5" placeholder="Code"/>
        <input name="Faxno" type="text" id="Faxno" size="18" placeholder="Fax no"/></div></li>             
        <li><div class="frmitemcaption">Visitor Address</div><div class="frmitem">
           
           <textarea name="Address" id="Address" cols="20" rows="3" placeholder="Visitor's Address"  onfocus="ShowVisitorAddress('Addressfrm', 'Address-LoadAddress');"></textarea>
        <input type="text" name="hdnAddress1" id="hdnAddress1" style="display:none;"  />
        <input type="text" name="hdnAddress2" id="hdnAddress2" style="display:none;" />   
        <input type="text" name="hdnLandmark" id="hdnLandmark" style="display:none;"  />
        <input type="text" name="hdnPinno" id="hdnPinno" style="display:none;"  />
    	<input type="text" name="hdnLocation" id="hdnLocation" style="display:none;"  />
		<input type="text" name="hdnCountry" id="hdnCountry" style="display:none;" />
		<input type="text" name="hdnState" id="hdnState" style="display:none;" />
		<input type="text" name="hdnCity" id="hdnCity" style="display:none;" /></div></li>
           
<li><div class="frmitemcaption"><strong>Notes</strong></div><div class="frmitem">
             
              <textarea name="Remark" id="Remark" cols="20" rows="3" placeholder="Important notes about the visitor to be recorded."></textarea></div></li>
<li class="row" ><div class="frmitemcaption">Category<span class="imp">*</span></div><div class="frmitem">
        <input type="text" name="Category" id="Category" placeholder="Visitor's Category" /></div></li>   
<li class="row"><div class="frmitemcaption"><strong>Additional Details</strong></div><div class="frmitems">

                      <select name="Add" id="Add" >
                      <option value="Knick Name">Knick Name a.k.a.</option>
                      <option value="Personal Email">Personal Email</option>
                      <option value="Official Email">Official Email</option>
                      <option value="Home Landline">Home Landline</option>
                      <option value="Office Landline">Office Landline</option>
                      <option value="Office Extension">Office Extension</option>
                      <option value="Skype">Skype</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Linkedin">Linkedin</option>
                      <option value="Attended By">Attended By</option>
                      <option value="To Meet">To Meet</option>
                      <option value="Purpose" selected="selected">Purpose</option>
      </select>
                      <input type="text" name="Adddetails" id="Adddetails" placeholder="Addition Details" />
              <span class="addbtn" onfocus="ShowForm('Countryfrm');"><i class="icon add"></i></span></div></li>
              <li class="row"> <div class="frmitembtns">
     <input type="submit" name="submitevent" id="submitevent" value="Add Visitor" class="formbutton" />
    <input type="reset" name="Cancel" id="Cancel" value="Cancel" class="formbutton" />
    </div>
    </li>
     </ul>
</form></td>
 </tr>
</table>
