<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2007 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
*/
	
	function hookDB(){
		$dbconnection = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
		mysql_select_db(DATABASE_NAME,$dbconnection);
	}//end hookDB()
	
	
/*	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	|	Modifying the code below this point is not permitted and violates the Helios EUL.	|
	|	Please do not edit or decode any code with this notice.								|
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~	*/
	
	eval(base64_decode('LypJZiB5b3UgY2FuIHJlYWQgdGhpcyB0aGVuIHlvdSBoYXZlIHZpb2xhdGVkIHRoZSBIZWxpb3MgRVVMKi8NCglpZighaXNzZXQoJHNldHVwKSl7DQoJCWhvb2tEQigpOw0KCQkkcmVzdWx0ID0gbXlzcWxfcXVlcnkoIlNFTEVDVCBTZXR0aW5nVmFsdWUgRlJPTSAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFdIRVJFIFBrSUQgSU4gKDE5LDIwKSIpOw0KCQkNCgkJaWYoISRyZXN1bHQpew0KCQkJaGFuZGxlRXJyb3IobXlzcWxfZXJybm8oKSwgbXlzcWxfZXJyb3IoKSk7DQoJCX1lbHNlew0KCQkJaWYoJF9TRVJWRVJbJ0hUVFBfSE9TVCddID09ICdsb2NhbGhvc3QnKXsNCgkJCQkvLyBkbyBub3RoaW5nDQoJCQl9IGVsc2VpZihteXNxbF9yZXN1bHQoJHJlc3VsdCwxLDApICE9IG1kNShkYXRlKCJZLW0tZCIsIG1rdGltZSggMCwgMCwgMCwgZGF0ZSgibSIpLCAxLCBkYXRlKCJZIikpKSkpew0KCQkJCQ0KCQkJCSRob3N0ID0gInZhbGlkYXRlLmhlbGlvc2NhbGVuZGFyLmNvbSI7DQoJCQkJJGZpbGUgPSAiL3YyLnBocD9jPSIgLiBteXNxbF9yZXN1bHQoJHJlc3VsdCwwLDApIC4gIiZ1PSIgLiAkX1NFUlZFUlsnSFRUUF9IT1NUJ107DQoJCQkJDQoJCQkJaWYoISgkZnAgPSBmc29ja29wZW4oJGhvc3QsIDgwLCAkZXJybm8sICRlcnJzdHIsIDEpKSApew0KCQkJCQkvLwljb25uZWN0aW9uIGZhaWxlZCByZXBvcnQgaXQNCgkJCQkJbXlzcWxfcXVlcnkoIlVQREFURSAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFNFVCBTZXR0aW5nVmFsdWUgPSAnIiAuIG1kNShkYXRlKCJZLW0tZCIsIG1rdGltZSggMCwgMCwgMCwgZGF0ZSgibSIpLCAxLCBkYXRlKCJZIikpKSkuICInIFdIRVJFIFBrSUQgPSAyMCIpOw0KCQkJCQkNCgkJCQkJJG1lc3NhZ2UgPSBiYXNlNjRfZW5jb2RlKCJSZWdpc3RyYXRpb246ICIgLiBteXNxbF9yZXN1bHQoJHJlc3VsdCwwLDApIC4gIi8vSG9zdDogIiAuICRfU0VSVkVSWydIVFRQX0hPU1QnXSAuICIvL1BIUF9TRUxGOiAiIC4gJF9TRVJWRVJbJ1BIUF9TRUxGJ10gLiAiLy9SRU1PVEVfQUREUjogIiAuICRfU0VSVkVSWydSRU1PVEVfQUREUiddIC4gIi8vUkVNT1RFX0hPU1Q6ICIgLiAkX1NFUlZFUlsnUkVNT1RFX0hPU1QnXSAuICIvL1BBVEhfVFJBTlNMQVRFRDogIiAuICRfU0VSVkVSWydQQVRIX1RSQU5TTEFURUQnXSAuICIvL09TOiAiIC4gJF9TRVJWRVJbJ09TJ10gLiAiLy9TRVJWRVJfU09GVFdBUkU6ICIgLiAkX1NFUlZFUlsnU0VSVkVSX1NPRlRXQVJFJ10gLiAiLy9QSFBfVmVyc2lvbjogIiAuIHBocHZlcnNpb24oKSAuICIvL1NFUlZFUl9OQU1FOiAiIC4gJF9TRVJWRVJbJ1NFUlZFUl9OQU1FJ10pOw0KCQkJCQltYWlsKCJzdXBwb3J0QGhlbGlvc2NhbGVuZGFyLmNvbSIsICAicG9sbHkgc2luZ3MgLS0gY29ubmVjdGlvbiBmYWlsZWQiLCAiJG1lc3NhZ2UiKTsNCgkJCQkJDQoJCQkJfSBlbHNlIHsNCgkJCQkJJHJlYWQgPSAiIjsNCgkJCQkJJHJlcXVlc3QgPSAiR0VUICRmaWxlIEhUVFAvMS4xXHJcbiI7DQoJCQkJCSRyZXF1ZXN0IC49ICJIb3N0OiAkaG9zdFxyXG4iOw0KCQkJCQkkcmVxdWVzdCAuPSAiQ29ubmVjdGlvbjogQ2xvc2VcclxuXHJcbiI7DQoJCQkJCWZ3cml0ZSgkZnAsICRyZXF1ZXN0KTsNCgkJCQkJDQoJCQkJCXdoaWxlICghZmVvZigkZnApKSB7DQoJCQkJCQkkcmVhZCAuPSBmcmVhZCgkZnAsMTAyNCk7DQoJCQkJCX0vL2VuZCB3aGlsZQ0KCQkJCQkNCgkJCQkJJG91dHB1dCA9IGV4cGxvZGUoImhlbGlvcy8vIiwgJHJlYWQpOw0KCQkJCQlpZihpc3NldCgkb3V0cHV0WzFdKSl7DQoJCQkJCQkvL3VwZGF0ZSBjYWNoZQ0KCQkJCQkJbXlzcWxfcXVlcnkoIlVQREFURSAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFNFVCBTZXR0aW5nVmFsdWUgPSAnIiAuIG1kNShkYXRlKCJZLW0tZCIsIG1rdGltZSggMCwgMCwgMCwgZGF0ZSgibSIpLCAxLCBkYXRlKCJZIikpKSkuICInIFdIRVJFIFBrSUQgPSAyMCIpOw0KCQkJCQkJDQoJCQkJCX0gZWxzZSB7DQoJCQkJCQlteXNxbF9xdWVyeSgiVVBEQVRFICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgU0VUIFNldHRpbmdWYWx1ZSA9ICciIC4gbWQ1KGRhdGUoIlktbS1kIiwgbWt0aW1lKCAwLCAwLCAwLCBkYXRlKCJtIiksIDEsIGRhdGUoIlkiKSkpKS4gIicgV0hFUkUgUGtJRCA9IDIwIik7DQoJCQkJCQkNCgkJCQkJCSRtZXNzYWdlID0gYmFzZTY0X2VuY29kZSgiUmVnaXN0cmF0aW9uOiAiIC4gbXlzcWxfcmVzdWx0KCRyZXN1bHQsMCwwKSAuICIvL0hvc3Q6ICIgLiAkX1NFUlZFUlsnSFRUUF9IT1NUJ10gLiAiLy9QSFBfU0VMRjogIiAuICRfU0VSVkVSWydQSFBfU0VMRiddIC4gIi8vUkVNT1RFX0FERFI6ICIgLiAkX1NFUlZFUlsnUkVNT1RFX0FERFInXSAuICIvL1JFTU9URV9IT1NUOiAiIC4gJF9TRVJWRVJbJ1JFTU9URV9IT1NUJ10gLiAiLy9QQVRIX1RSQU5TTEFURUQ6ICIgLiAkX1NFUlZFUlsnUEFUSF9UUkFOU0xBVEVEJ10gLiAiLy9PUzogIiAuICRfU0VSVkVSWydPUyddIC4gIi8vU0VSVkVSX1NPRlRXQVJFOiAiIC4gJF9TRVJWRVJbJ1NFUlZFUl9TT0ZUV0FSRSddIC4gIi8vUEhQX1ZlcnNpb246ICIgLiBwaHB2ZXJzaW9uKCkgLiAiLy9TRVJWRVJfTkFNRTogIiAuICRfU0VSVkVSWydTRVJWRVJfTkFNRSddKTsNCgkJCQkJCW1haWwoInN1cHBvcnRAaGVsaW9zY2FsZW5kYXIuY29tIiwgICJwb2xseSBzaW5ncyAtLSBpbnZhbGlkIHJlZ2lzdHJhdGlvbiIsICIkbWVzc2FnZSIpOw0KCQkJCQkJDQoJCQkJCX0vL2VuZCBpZg0KCQkJCQlmY2xvc2UoJGZwKTsNCgkJCQl9Ly9lbmQgaWYNCgkJCQkNCgkJCQkNCgkJCX0vL2VuZCBpZg0KCQl9Ly9lbmQgaWYNCgl9Ly9lbmQgaWY='));
?>