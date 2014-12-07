<table width="100%" border="0" cellpadding="0" cellspacing="0" class="appformdlg appform">
  <tr>
    <th width="98%" ><h3>Event</h3></th>
    <th width="2%"><div class="iconbtn icon close" onclick="HideForm('EventForm');"></div></th>
  </tr>
   <tr>
    <td colspan="2" ><div id="Event-FormError" class="frmhelper"></div></td>
  </tr>
  <tr>
    <td colspan="2" ><form name="Events-AddNewEvent" id="Events-AddNewEvent" method="post" action="" onsubmit="return false;">
    
     <ul class="clearfix webform">
     <li><div class="frmitemcaption">Event Name<span class="imp">*</span></div><div class="frmitem"><input type="text" name="EventName" id="EventName" placeholder="Name of your event" /></div></li>
      <li><div class="frmitemcaption">Starts on<span class="imp">*</span></div><div class="frmitem"><input class="calctrl" type="text" name="EventSDate" id="EventSDate" placeholder="Starts from" /></div></li>
      <li><div class="frmitemcaption">End on<span class="imp">*</span></div><div class="frmitem"><input class="calctrl" type="text" name="EventEDate" id="EventEDate" placeholder="Ends on" /></div></li>
        <li><div class="frmitemcaption">Venue Address<span class="imp">*</span></div><div class="frmitem"><textarea type="text" name="EventAddress" id="EventAddress" placeholder="Address of the Event" cols="4" rows="3" ></textarea></div></li>
         <li><div class="frmtext"> <input name="PreRegister" type="checkbox" id="PreRegister" class="forminput" />
           <strong>Pre Registration Required </strong> </div></li> 
           <li class="row"><h4>Invitation Setting</h4></li>
           <li><div class="frmitemcaption">SMS Sender ID</div><div class="frmitem"><input type="text" name="SmsSenderCode" id="SmsSenderCode" placeholder="6 Characters SENDER ID" /></div></li>
           <li><div class="frmitemcaption">Invite From</div><div class="frmitem"><input type="text" name="SenderEmail" id="SenderEmail" placeholder="Send invitation using" /></div></li>
           <li class="row"><div class="frmitembtns">
    <input type="submit" name="submitevent" id="submitevent" value="Add New Event" class="formbutton" />
    <input type="reset" name="Cancel" id="Cancel" value="Cancel" class="formbutton" />
	
    </div>
    </li>
     </ul>
     </form></td>
  </tr>
</table>

