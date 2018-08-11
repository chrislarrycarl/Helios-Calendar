<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2005 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	|	Modifying Helios Setup files is not permitted and violates the Helios EUL.	|
	|	Please do not edit this or any of the setup files							|
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
	if(!isset($_SESSION['license']) && !isset($_SESSION['valid'])){?>
		<a href="<?echo CalRoot;?>/setup/" class="main">Click here to being Helios setup.</a>
<?	} else {
		if(!isset($_POST['firstname'])){?>
			<script language="JavaScript">
			function checkEmail(obj) {
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(obj.value)){
					return 0;
				} else {
					return 1;
				}//end if
			}//end chkEmail
			
			function chkFrm(){
			dirty = 0;
			warn = "Account cannot be created because of the following reasons:\n";
				
				if(document.frm.firstname.value == ''){
					dirty = 1;
					warn = warn + '\n*First Name is Required';
				}//end if
				
				if(document.frm.lastname.value == ''){
					dirty = 1;
					warn = warn + '\n*Last Name is Required';
				}//end if
				
				if(document.frm.email.value == ''){
					dirty = 1;
					warn = warn + '\n*Email is Required';
				}//end if
				
				if(document.frm.email.value != '' && checkEmail(document.frm.email) == 1){
					dirty = 1;
					warn = warn + '\n*Email Format is Invalid';
				}//end if
				
				if(document.frm.password.value == ''){
					dirty = 1;
					warn = warn + '\n*Password is Required';
				}//end if
				
				if(dirty > 0){
					alert(warn + '\n\nPlease make the required changes and try again.');
					return false;
				} else {
					return true;
				}//end if
				
			}//end chkFrm
			</script>
			<form name="frm" id="frm" method="post" action="<?echo CalRoot;?>/setup/index.php?step=4" onSubmit="return chkFrm();">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td colspan="3" class="eventMain">
						Complete the form below with the information for your administration console account.
						<br><br>
						When setup is complete you will use this account to login to your Helios admin console, so keep it
						for your records.
						<br><br>
					</td>
				</tr>
				<tr><td colspan="3"><img src="<?echo CalAdminRoot;?>/images/spacer.gif" width="1" height="4" alt="" border="0"></td></tr>
				<tr>
					<td class="eventMain" width="125">First Name:</td>
					<td>
						<input tabindex="1" size="20" maxlength="50" type="text" name="firstname" id="firstname" value="" class="eventInput">
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr><td colspan="2"><img src="<?echo CalAdminRoot;?>/images/spacer.gif" width="1" height="4" alt="" border="0"></td></tr>
				<tr>
					<td class="eventMain">Last Name:</td>
					<td>
						<input tabindex="2" size="20" maxlength="50" type="text" name="lastname" id="lastname" value="" class="eventInput">
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr><td colspan="2"><img src="<?echo CalAdminRoot;?>/images/spacer.gif" width="1" height="4" alt="" border="0"></td></tr>
				<tr>
					<td class="eventMain">Email:</td>
					<td>
						
						<table cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td><input tabindex="3" size="30" maxlength="100" type="text" name="email" id="email" value="" class="eventInput"></td>
								<td width="25" align="right"><? appInstructionsIcon("Admin Email Address", "This will be used as the username for the account."); ?></td>
							</tr>
						</table>
						
					</td>
				</tr>
				<tr><td colspan="2"><img src="<?echo CalAdminRoot;?>/images/spacer.gif" width="1" height="4" alt="" border="0"></td></tr>
				<tr>
					<td class="eventMain">Password:</td>
					<td>
						<input tabindex="4" size="15" maxlength="15" type="text" name="password" id="password" value="" class="eventInput">
					</td>
				</tr>
				<tr><td colspan="2"><img src="<?echo CalAdminRoot;?>/images/spacer.gif" width="1" height="4" alt="" border="0"></td></tr>
			</table>
			<div align="right"><input tabindex="5" type="submit" name="submit" id="submit" value="Setup Database" class="eventButton"></div>
			</form>
	<?	} else {	?>
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="eventMain">
					<?eval(base64_decode('LypJZiB5b3UgY2FuIHJlYWQgdGhpcyB5b3UgaGF2ZSBicm9rZW4gdGhlIEhlbGlvcyBFVUwuKi8/Pg0KCQkJCQlTZXR1cCB3aWxsIG5vdyBjcmVhdGUgeW91ciBIZWxpb3MgZGF0YWJhc2UuLi48YnI+PGJyPg0KCQkJCTw/CSRkYmNvbm5lY3Rpb24gPSBteXNxbF9jb25uZWN0KERBVEFCQVNFX0hPU1QsIERBVEFCQVNFX1VTRVIsIERBVEFCQVNFX1BBU1MpOw0KCQkJCQkNCgkJCQkJbXlzcWxfc2VsZWN0X2RiKERBVEFCQVNFX05BTUUsJGRiY29ubmVjdGlvbik7DQoJCQkJCWVjaG8gIkNyZWF0aW5nIDxpPiIgLiBEQVRBQkFTRV9OQU1FIC4gIjwvaT4gZGF0YWJhc2UuLi4iOw0KCQkJCQkNCgkJCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJDUkVBVEUgREFUQUJBU0UgSUYgTk9UIEVYSVNUUyAiIC4gREFUQUJBU0VfTkFNRSk7DQoJCQkJCWlmKG15c3FsX2FmZmVjdGVkX3Jvd3MoKSA+IDApew0KCQkJCQkJZWNobyAiU3VjY2Vzc2Z1bCI7DQoJCQkJCX0gZWxzZSB7DQoJCQkJCQllY2hvICJBbHJlYWR5IEV4aXN0cyI7DQoJCQkJCX0NCgkJCQkJDQoJCQkJCWVjaG8gIjxicj5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gImFkbWluPC9pPiB0YWJsZS4uLiI7DQoJCQkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJhZG1pbiAoUGtJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGF1dG9faW5jcmVtZW50LEZpcnN0TmFtZSB2YXJjaGFyKDUwKSBkZWZhdWx0IE5VTEwsTGFzdE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLEVtYWlsIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsUGFzc3dyZCB2YXJjaGFyKDIwKSBkZWZhdWx0IE5VTEwsSXNBY3RpdmUgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcxJyxMb2dpbkNudCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLExhc3RMb2dpbiBkYXRldGltZSBkZWZhdWx0IE5VTEwsU3VwZXJBZG1pbiB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFNob3dJbnN0cnVjdGlvbnMgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcxJyxQUklNQVJZIEtFWSAgKFBrSUQpLFVOSVFVRSBLRVkgUGtJRCAoUGtJRCksS0VZIFBrSURfMiAoUGtJRCkpIik7DQoJCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCQkJDQoJCQkJCWVjaG8gIjxicj4mbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDtDcmVhdGluZyBBZG1pbiBBY2NvdW50Li4uIjsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW4gVkFMVUVTKCcxJywnIiAuICRfUE9TVFsnZmlyc3RuYW1lJ10gLiAiJywnIiAuICRfUE9TVFsnbGFzdG5hbWUnXSAuICInLCciIC4gJF9QT1NUWydlbWFpbCddIC4gIicsJyIgLiAkX1BPU1RbJ3Bhc3N3b3JkJ10gLiAiJywnMScsICcwJywgTlVMTCwgJzAnLCAnMScpIik7DQoJCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCQkJDQoJCQkJCWVjaG8gIjxicj5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gImFkbWlubG9naW5oaXN0b3J5PC9pPiB0YWJsZS4uLiI7DQoJCQkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJhZG1pbmxvZ2luaGlzdG9yeSAoUGtJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGF1dG9faW5jcmVtZW50LEFkbWluSUQgaW50KDExKSB1bnNpZ25lZCBkZWZhdWx0IE5VTEwsSVAgdmFyY2hhcigxNikgZGVmYXVsdCBOVUxMLENsaWVudCB2YXJjaGFyKDEwMCkgZGVmYXVsdCBOVUxMLExvZ2luVGltZSBkYXRldGltZSBkZWZhdWx0IE5VTEwsUFJJTUFSWSBLRVkgIChQa0lEKSxVTklRVUUgS0VZIFBrSUQgKFBrSUQpLEtFWSBQa0lEXzIgKFBrSUQpKTsiKTsNCgkJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJCQkNCgkJCQkJZWNobyAiPGJyPkNyZWF0aW5nIDxpPiIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW5wZXJtaXNzaW9uczwvaT4gdGFibGUuLi4iOw0KCQkJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW5wZXJtaXNzaW9ucyAoUGtJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGF1dG9faW5jcmVtZW50LEV2ZW50RWRpdCBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsRXZlbnRQZW5kaW5nIGludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxFdmVudENhdGVnb3J5IGludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxVc2VyRWRpdCBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsQWRtaW5FZGl0IGludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxOZXdzbGV0dGVyIGludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxTZXR0aW5ncyBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsUmVwb3J0cyBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsQWRtaW5JRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxJc0FjdGl2ZSBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsUFJJTUFSWSBLRVkgIChQa0lEKSkiKTsNCgkJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJCQkNCgkJCQkJZWNobyAiPGJyPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO1NldHRpbmcgQWRtaW4gUGVybWlzc2lvbi4uLiI7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gImFkbWlucGVybWlzc2lvbnMgVkFMVUVTKCcxJywgJzEnLCAnMScsICcxJywgJzEnLCAnMScsICcxJywgJzEnLCAnMScsICcxJywgJzEnKSIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJjYXRlZ29yaWVzPC9pPiB0YWJsZS4uLiI7DQoJCQkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJjYXRlZ29yaWVzIChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsQ2F0ZWdvcnlOYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxQYXJlbnRJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLElzQWN0aXZlIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMScsUGF0aCB2YXJjaGFyKDEwMCkgTk9UIE5VTEwgZGVmYXVsdCAnLycsTGV2ZWwgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxQUklNQVJZIEtFWSAgKFBrSUQpLFVOSVFVRSBLRVkgUGtJRCAoUGtJRCksS0VZIFBrSURfMiAoUGtJRCkpIik7DQoJCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCQkJZWNobyAiPGJyPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO0FkZGluZyBEZWZhdWx0IENhdGVnb3J5Li4uIjsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAiY2F0ZWdvcmllcyBWQUxVRVMoJzEnLCAnRXZlbnRzJywgJzAnLCAnMScsICcvJywgJzAnKSIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJldmVudGNhdGVnb3JpZXM8L2k+IHRhYmxlLi4uIjsNCgkJCQkJbXlzcWxfcXVlcnkoIkNSRUFURSBUQUJMRSAiIC4gSENfVGJsUHJlZml4IC4gImV2ZW50Y2F0ZWdvcmllcyAoRXZlbnRJRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxDYXRlZ29yeUlEIGludCgxMSkgdW5zaWduZWQgZGVmYXVsdCBOVUxMLEtFWSBFdmVudElEIChFdmVudElEKSxLRVkgQ2F0ZWdvcnlJRCAoQ2F0ZWdvcnlJRCkpIik7DQoJCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCQkJZWNobyAiPGJyPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO0NyZWF0aW5nIERlZmF1bHQgRXZlbnQvQ2F0ZWdvcnkgUGFpcmluZy4uLiI7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gImV2ZW50Y2F0ZWdvcmllcyBWQUxVRVMoCScxJywgJzEnKSIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJldmVudHM8L2k+IHRhYmxlLi4uIjsNCgkJCQkJbXlzcWxfcXVlcnkoIkNSRUFURSBUQUJMRSAiIC4gSENfVGJsUHJlZml4IC4gImV2ZW50cyAoUGtJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGF1dG9faW5jcmVtZW50LFRpdGxlIHZhcmNoYXIoMTUwKSBkZWZhdWx0IE5VTEwsTG9jYXRpb25OYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxMb2NhdGlvbkFkZHJlc3MgdmFyY2hhcig3NSkgZGVmYXVsdCBOVUxMLExvY2F0aW9uQWRkcmVzczIgdmFyY2hhcig3NSkgZGVmYXVsdCBOVUxMLExvY2F0aW9uQ2l0eSB2YXJjaGFyKDUwKSBkZWZhdWx0IE5VTEwsTG9jYXRpb25TdGF0ZSBjaGFyKDIpIGRlZmF1bHQgTlVMTCxMb2NhdGlvblppcCB2YXJjaGFyKDExKSBkZWZhdWx0IE5VTEwsRGVzY3JpcHRpb24gbWVkaXVtdGV4dCxTdGFydERhdGUgZGF0ZSBkZWZhdWx0IE5VTEwsU3RhcnRUaW1lIHRpbWUgZGVmYXVsdCBOVUxMLFRCRCBpbnQoMykgZGVmYXVsdCBOVUxMLEVuZFRpbWUgdGltZSBkZWZhdWx0IE5VTEwsQ29udGFjdE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLENvbnRhY3RFbWFpbCB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsQ29udGFjdFBob25lIHZhcmNoYXIoMTUpIGRlZmF1bHQgTlVMTCxJc0FjdGl2ZSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzEnLElzQXBwcm92ZWQgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxJc0JpbGxib2FyZCB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFNlcmllc0lEIHZhcmNoYXIoMjApIGRlZmF1bHQgTlVMTCxTdWJtaXR0ZWRCeU5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLFN1Ym1pdHRlZEJ5RW1haWwgdmFyY2hhcig3NSkgZGVmYXVsdCBOVUxMLFN1Ym1pdHRlZEF0IGRhdGV0aW1lIGRlZmF1bHQgTlVMTCxBbGVydFNlbnQgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxDb250YWN0VVJMIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsQWxsb3dSZWdpc3RlciB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFNwYWNlc0F2YWlsYWJsZSBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFB1Ymxpc2hEYXRlIGRhdGV0aW1lIGRlZmF1bHQgTlVMTCxWaWV3cyBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLE1lc3NhZ2UgbG9uZ3RleHQsRGlyZWN0aW9ucyBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLERvd25sb2FkcyBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLEVtYWlsVG9GcmllbmQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxVUkxDbGlja3MgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxNVmlld3MgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxQUklNQVJZIEtFWSAgKFBrSUQpLFVOSVFVRSBLRVkgUGtJRCAoUGtJRCksS0VZIFBrSURfMiAoUGtJRCkpIik7DQoJCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCQkJZWNobyAiPGJyPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO0NyZWF0aW5nIERlZmF1bHQgRXZlbnQuLi4iOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJldmVudHMgVkFMVUVTKCcxJywnIiAuIENhbE5hbWUgLiAiIE9wZW5zJywnT24gb3VyIHdlYnNpdGUnLCc2MCBNb25yb2UgQ2VudGVyIFN0IE5XJyxOVUxMLCdHcmFuZCBSYXBpZHMnLCdNSScsJzQ5NTAzJywnIFdlbGNvbWUgdG8geW91ciBuZXcgSGVsaW9zIENhbGVuZGFyIHBvd2VyZWQgZXZlbnQgd2Vic2l0ZS48YnI+PGJyPkhlcmUgYXJlIGEgZmV3IGxpbmtzIHlvdSB3aWxsIHByb2JhYmx5IHdhbnQgdG8ga2VlcCBjbG9zZS48YnI+PGJyPjxhIGhyZWY9XCJodHRwOi8vd3d3LmhlbGlvc2NhbGVuZGFyLmNvbVwiIHRhcmdldD1cIm5ld1wiPkhlbGlvcyBXZWJzaXRlPC9hPjxicj4gPGEgaHJlZj1cImh0dHA6Ly9jb2RleC5oZWxpb3NjYWxlbmRhci5jb21cIiB0YXJnZXQ9XCJuZXdcIj5UaGUgQ29kZXg8L2E+PGJyPiA8YSBocmVmPVwiaHR0cDovL2Rldi5oZWxpb3NjYWxlbmRhci5jb21cIiB0YXJnZXQ9XCJuZXdcIj5UaGUgRGV2ZWxvcG1lbnQgQmxvZzwvYT48YnI+PGJyPlRoYW5rIHlvdSBmb3IgY2hvb3NpbmcgSGVsaW9zLicsJyIgLiBkYXRlKCJZLW0tZCIpIC4gIicsTlVMTCwnMScsTlVMTCxOVUxMLE5VTEwsTlVMTCwnMScsJzEnLCcxJyxOVUxMLE5VTEwsTlVMTCxOVUxMLCcwJywnIiAuIENhbFJvb3QgLiAiJywnMCcsJzAnLCciIC4gZGF0ZSgiWS1tLWQiKSAuICIgMDA6MDA6MDAnLCcwJyxOVUxMLCcwJywnMCcsJzAnLCcwJywnMCcpOyIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJuZXdzbGV0dGVyczwvaT4gdGFibGUuLi4iOw0KCQkJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAibmV3c2xldHRlcnMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxUZW1wbGF0ZU5hbWUgdmFyY2hhcigyNTApIGRlZmF1bHQgTlVMTCxUZW1wbGF0ZVNvdXJjZSBsb25ndGV4dCxJc0FjdGl2ZSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFBSSU1BUlkgS0VZICAoUGtJRCksVU5JUVVFIEtFWSBQa0lEIChQa0lEKSxLRVkgUGtJRF8yIChQa0lEKSkiKTtlY2hvICJGaW5pc2hlZCI7ZWNobyAiPGJyPkNyZWF0aW5nIDxpPiIgLiBIQ19UYmxQcmVmaXggLiAicmVnaXN0cmFudHM8L2k+IHRhYmxlLi4uIjtteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAicmVnaXN0cmFudHMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxOYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxFbWFpbCB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsUGhvbmUgdmFyY2hhcigxNSkgZGVmYXVsdCBOVUxMLEFkZHJlc3MgdmFyY2hhcig3NSkgZGVmYXVsdCBOVUxMLEFkZHJlc3MyIHZhcmNoYXIoNzUpIGRlZmF1bHQgTlVMTCxDaXR5IHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxTdGF0ZSBjaGFyKDIpIGRlZmF1bHQgTlVMTCxaaXAgdmFyY2hhcig1KSBkZWZhdWx0IE5VTEwsRXZlbnRJRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxJc0FjdGl2ZSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzEnLFJlZ2lzdGVyZWRBdCBkYXRldGltZSBkZWZhdWx0IE5VTEwsUFJJTUFSWSBLRVkgIChQa0lEKSxVTklRVUUgS0VZIFBrSUQgKFBrSUQpLEtFWSBQa0lEXzIgKFBrSUQpKSIpO2VjaG8gIkZpbmlzaGVkIjtlY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJzZW5kdG9mcmllbmQ8L2k+IHRhYmxlLi4uIjtteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAic2VuZHRvZnJpZW5kIChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsTXlOYW1lIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsTXlFbWFpbCB2YXJjaGFyKDEwMCkgZGVmYXVsdCBOVUxMLFJlY2lwaWVudE5hbWUgdmFyY2hhcigxMDApIGRlZmF1bHQgTlVMTCxSZWNpcGllbnRFbWFpbCB2YXJjaGFyKDEwMCkgZGVmYXVsdCBOVUxMLE1lc3NhZ2UgbG9uZ3RleHQsRXZlbnRJRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxJUEFkZHJlc3MgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLFNlbmREYXRlIGRhdGV0aW1lIGRlZmF1bHQgTlVMTCxQUklNQVJZIEtFWSAgKFBrSUQpLFVOSVFVRSBLRVkgUGtJRCAoUGtJRCksS0VZIFBrSURfMiAoUGtJRCkpIik7ZWNobyAiRmluaXNoZWQiO2VjaG8gIjxicj5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzPC9pPiB0YWJsZS4uLiI7bXlzcWxfcXVlcnkoIkNSRUFURSBUQUJMRSAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsU2V0dGluZ1ZhbHVlIHRleHQsUFJJTUFSWSBLRVkgIChQa0lEKSxVTklRVUUgS0VZIFBrSUQgKFBrSUQpLEtFWSBQa0lEXzIgKFBrSUQpKTsiKTsNCgkJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJCQllY2hvICI8YnI+Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Q29uZmlndXJpbmcgRGVmYXVsdCBTZXR0aW5ncy4uLiI7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMScsICcxJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMicsICcyMCcpOyIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzMnLCBOVUxMKTsiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCc0JywgTlVMTCk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnNScsICdIZWxpb3MsIENhbGVuZGFyJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnNicsICdQb3dlcmVkIGJ5IHRoZSBIZWxpb3MgQ2FsZW5kYXIuJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnNycsICcxJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnOCcsICcwJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnOScsICcwJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTAnLCAnMTAnKTsiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxMScsICcxJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTInLCAnMTAnKTsiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxMycsICcxJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTQnLCAnRiBkUywgWScpOyIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzE1JywgJzEnKTsiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxNicsICciIC4gJF9TRVNTSU9OWydyZWduYW1lJ10gLiAiJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTcnLCAnIiAuICRfU0VTU0lPTlsncmVndXJsJ10gLiAiJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTgnLCAnIiAuICRfU0VTU0lPTlsncmVnZW1haWwnXSAuICInKTsiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxOScsICciIC4gJF9TRVNTSU9OWydyZWdjb2RlJ10gLiAiJyk7Iik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMjAnLCBOVUxMKTsiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcyMScsICdNSScpOyIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJ1c2VyY2F0ZWdvcmllczwvaT4gdGFibGUuLi4iOw0KCQkJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcmNhdGVnb3JpZXMgKFVzZXJJRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxDYXRlZ29yeUlEIGludCgxMSkgdW5zaWduZWQgZGVmYXVsdCBOVUxMLEtFWSBDYXRlZ29yeUlEIChDYXRlZ29yeUlEKSxLRVkgVXNlcklEIChVc2VySUQpKSIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbjwvaT4gdGFibGUuLi4iOw0KCQkJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcm9jY3VwYXRpb24gKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxPY2N1cGF0aW9uIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsSXNBY3RpdmUgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcxJyxQUklNQVJZIEtFWSAgKFBrSUQpLFVOSVFVRSBLRVkgUGtJRCAoUGtJRCksS0VZIFBrSURfMiAoUGtJRCkpIik7DQoJCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCQkJZWNobyAiPGJyPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO0NyZWF0aW5nIFVzZXIgT2NjdXBhdGlvbiBPcHRpb25zLi4uIjsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcm9jY3VwYXRpb24gVkFMVUVTKCcxJywgJ0FjY291bnRpbmcvRmluYW5jaWFsJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzInLCAnQ29tcHV0ZXIgUmVsYXRlZCAob3RoZXIpJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzMnLCAnQ29tcHV0ZXIgUmVsYXRlZCAoaW50ZXJuZXQpJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzQnLCAnQ29uc3VsdGluZycsICcxJykiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcm9jY3VwYXRpb24gVkFMVUVTKCc1JywgJ0N1c3RvbWVyIFNlcnZpY2UvU3VwcG9ydCcsICcxJykiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcm9jY3VwYXRpb24gVkFMVUVTKCc2JywgJ0VkdWNhdGlvbi9UcmFpbmluZycsICcxJykiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcm9jY3VwYXRpb24gVkFMVUVTKCc3JywgJ0VuZ2luZWVyaW5nJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzgnLCAnRXhlY3V0aXZlL1NlbmlvciBNYW5hZ2VtZW50JywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzknLCAnR2VuZXJhbCBBZG1pbmlzdHJhdGl2ZS9TdXBlcnZpc29yJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzEwJywgJ0dvdmVybm1lbnQvTWlsaXRhcnknLCAnMScpIik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInVzZXJvY2N1cGF0aW9uIFZBTFVFUygnMTEnLCAnSG9tZW1ha2VyJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzEyJywgJ01hbnVmYWN0dXJpbmcvUHJvZHVjdGlvbi9PcGVyYXRpb25zJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzEzJywgJ1Byb2Zlc3Npb25hbCAoTWVkaWNhbC4gTGVnYWwuIEV0YyknLCAnMScpIik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInVzZXJvY2N1cGF0aW9uIFZBTFVFUygnMTQnLCAnUmVzZWFyY2ggYW5kIERldmVsb3BtZW50JywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzE1JywgJ1JldGlyZWQnLCAnMScpIik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInVzZXJvY2N1cGF0aW9uIFZBTFVFUygnMTYnLCAnU2FsZXMvTWFya2V0aW5nL0FkdmVydGlzaW5nJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzE3JywgJ1NlbGYtRW1wbG95ZWQvT3duZXInLCAnMScpIik7DQoJCQkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInVzZXJvY2N1cGF0aW9uIFZBTFVFUygnMTgnLCAnU3R1ZGVudCcsICcxJykiKTsNCgkJCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcm9jY3VwYXRpb24gVkFMVUVTKCcxOScsICdUcmFkZXNtYW4vQ3JhZnRzbWFuJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzIwJywgJ1VuZW1wbG95ZWQvQmV0d2VlbiBKb2JzJywgJzEnKSIpOw0KCQkJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJ1c2Vyb2NjdXBhdGlvbiBWQUxVRVMoJzIxJywgJ090aGVyJywgJzEnKSIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQllY2hvICI8YnI+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJ1c2VyczwvaT4gdGFibGUuLi4iOw0KCQkJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcnMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxGaXJzdE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLExhc3ROYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxFbWFpbCB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsT2NjdXBhdGlvbklEIGludCgxMSkgZGVmYXVsdCBOVUxMLFppcCB2YXJjaGFyKDEwKSBkZWZhdWx0IE5VTEwsSXNSZWdpc3RlcmVkIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsR1VJRCB2YXJjaGFyKDUwKSBkZWZhdWx0IE5VTEwsQWRkZWRCeSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFJlZ2lzdGVyZWRBdCBkYXRldGltZSBkZWZhdWx0IE5VTEwsUmVnaXN0ZXJJUCB2YXJjaGFyKDE1KSBkZWZhdWx0IE5VTEwsUFJJTUFSWSBLRVkgIChQa0lEKSxVTklRVUUgS0VZIFBrSUQgKFBrSUQpLEtFWSBQa0lEXzIgKFBrSUQpKSIpOw0KCQkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQkJCQ0KCQkJCQkkcmVzdWx0ID0gbXlzcWxfcXVlcnkoIlNFTEVDVCAqIEZST00gIiAuIEhDX1RibFByZWZpeCAuICJhZG1pbiIpOw0KCQkJCQlpZighJHJlc3VsdCB8fCBteXNxbF9udW1fcm93cygkcmVzdWx0KSA9PSAwKXsNCgkJCQkJPz4NCgkJCQkJCTxicj48YnI+DQoJCQkJCQlTZXR1cCB3YXMgdW5hYmxlIHRvIHN1Y2Nlc3NmdWxseSBjcmVhdGUgeW91ciBIZWxpb3MgZGF0YWJhc2UuIFBsZWFzZSB2ZXJpZnkgeW91ciBkYXRhYmFzZSB1c2VyDQoJCQkJCQlhY2NvdW50IGlzIHNldHVwIGNvcnJlY3RseSBhbmQgPGEgaHJlZj0iPD9lY2hvIENhbFJvb3Q7Pz4vc2V0dXAvaW5kZXgucGhwP3N0ZXA9NCIgY2xhc3M9Im1haW4iPnRyeSB0aGlzIHN0ZXAgYWdhaW48L2E+DQoJCQkJCTw/DQoJCQkJCX0gZWxzZSB7DQoJCQkJCT8+DQoJCQkJCQk8YnI+PGJyPg0KCQkJCQkJQ29uZ3JhdHVsYXRpb25zLiBTZXR1cCBvZiB5b3VyIEhlbGlvcyBDYWxlbmRhciBpcyBjb21wbGV0ZS48YnI+DQoJCQkJCQlQbGVhc2UgYmUgc3VyZSB0byA8Yj5kZWxldGUgdGhlIHNldHVwIGRpcmVjdG9yeTwvYj4gYmVmb3JlIHVzaW5nIEhlbGlvcy4NCgkJCQkJCTxicj48YnI+DQoJCQkJCQk8YSBocmVmPSI8P2VjaG8gQ2FsUm9vdDs/Pi8iIGNsYXNzPSJtYWluIj5Zb3VyIEhlbGlvcyBQdWJsaWMgQ2FsZW5kYXI8L2E+DQoJCQkJCQk8YnI+DQoJCQkJCQk8YSBocmVmPSI8P2VjaG8gQ2FsQWRtaW5Sb290Oz8+LyIgY2xhc3M9Im1haW4iPllvdXIgSGVsaW9zIEFkbWluaXN0cmF0aW9uIENvbnNvbGU8L2E+DQoJCQkJCTw/DQoJCQkJCX0vL2VuZCBpZg=='));?>
				</td>
			</tr>
		</table>
<?	}//end if
}//end if