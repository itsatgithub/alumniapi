<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<h2>Test GET web service</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="get">
	<table>
	<tr>
		<td align="right">alumni_personalcode</td>
		<td><input name="alumni_personalcode" type="text" size="50" maxlength="50"></td>
		<td>eg. 00028 for one alumni. Empty for ALL the alumni</td>	
	</tr>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>
	
<h2>Test save_personal</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="save_personal">
<table>
	<tr>
		<td align="right">alumni_personalcode</td>
		<td><input name="alumni_personalcode" type="text" size="50" maxlength="50"></td>
		<td>eg. esp01 for UPDATE. Keep it empty for INSERT</td>
	</tr>
	<tr>
		<td align="right">titles</td>
		<td><input name="titles" type="text" size="50" maxlength="50" value="0000000000002"></td>
		<td>eg. 0000000000002</td>
		</tr>
	<tr>
		<td align="right">firstname</td>
		<td><input name="firstname" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">surname</td>
		<td><input name="surname" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">irb_surname</td>
		<td><input name="irb_surname" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">gender</td>
		<td><input name="gender" type="text" size="50" maxlength="50" value="00001"></td>
		<td>eg. 00001</td>
		</tr>
	<tr>
		<td align="right">nationality</td>
		<td><input name="nationality" type="text" size="50" maxlength="50" value="ESP"></td>
		<td>eg. ESP</td>
		</tr>
	<tr>
		<td align="right">nationality_2</td>
		<td><input name="nationality_2" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">birth</td>
		<td><input name="birth" type="text" size="50" maxlength="50"></td>
		<td>eg. 1970-04-10 00:00:00</td>
		</tr>
	<tr>
		<td align="right">email</td>
		<td><input name="email" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">url</td>
		<td><input name="url" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">facebook</td>
		<td><input name="facebook" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">linkedin</td>
		<td><input name="linkedin" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">twitter</td>
		<td><input name="twitter" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">keywords</td>
		<td><input name="keywords" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">biography</td>
		<td><input name="biography" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">awards</td>
		<td><input name="awards" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">ORCIDID</td>
		<td><input name="ORCIDID" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">researcherid</td>
		<td><input name="researcherid" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">pubmedid</td>
		<td><input name="pubmedid" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">show_data</td>
		<td><input name="show_data" type="text" size="50" maxlength="50"></td>
		<td>eg. 1</td>
	</tr>
	<tr>
	<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>

<h2>Test save_external_jobs</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="save_external_jobs">
	<table>
	<tr>
		<td align="right">alumni_personalcode</td>
		<td><input name="alumni_personalcode" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">Start date</td>
		<td><input name="start_date" type="text" size="50" maxlength="50" value="2015-01-01"></td>
		<td>eg. 1970-04-10 00:00:00</td>
	</tr>
	<tr>
		<td align="right">End date</td>
		<td><input name="end_date" type="text" size="50" maxlength="50" value="2015-01-02"></td>
		<td>eg. 1970-04-10 00:00:00</td>
	</tr>
	<tr>
		<td align="right">Job positions</td>
		<td><input name="external_job_positions" type="text" size="50" maxlength="50" value="0000000000001"></td>
	</tr>	
	<tr>
		<td align="right">Comments</td>
		<td><input name="comments" type="text" size="50" maxlength="50" value="Los comments"></td>
	</tr>	
	<tr>
		<td align="right">External job. Job sectors</td>
		<td><input name="external_job_sectors" type="text" size="50" maxlength="50" value="0000000000001"></td>
	</tr>	
	<tr>
		<td align="right">Institution</td>
		<td><input name="institution" type="text" size="50" maxlength="50" value="IRB Barcelona"></td>
	</tr>	
	<tr>
		<td align="right">Address</td>
		<td><input name="address" type="text" size="50" maxlength="50" value="Joan Oms, 13"></td>
	</tr>	
	<tr>
		<td align="right">Postcode</td>
		<td><input name="postcode" type="text" size="50" maxlength="50" value="08360"></td>
	</tr>	
	<tr>
		<td align="right">City</td>
		<td><input name="city" type="text" size="50" maxlength="50" value="Barcelona"></td>
	</tr>	
	<tr>
		<td align="right">Country</td>
		<td><input name="country" type="text" size="50" maxlength="50" value="ES"></td>
	</tr>	
	<tr>
		<td align="right">Telephone</td>
		<td><input name="telephone" type="text" size="50" maxlength="50" value="937945555"></td>
	</tr>	
	<tr>
		<td align="right">Current</td>
		<td><input name="current" type="text" size="50" maxlength="50" value="1"></td>
	</tr>	
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>

<h2>Test remove_external_jobs</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="remove_external_jobs">
	<table>
	<tr>
		<td align="right">alumni_personalcode</td>
		<td><input name="alumni_personalcode" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>
	
<h2>Test save_communications</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="save_communications">
	<table>
	<tr>
		<td align="right">alumni_personalcode</td>
		<td><input name="alumni_personalcode" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td align="right">alumni_communicationscode</td>
		<td><input name="alumni_communicationscode" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>

<h2>Test remove_communications</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="remove_communications">
	<table>
	<tr>
		<td align="right">alumni_personalcode</td>
		<td><input name="alumni_personalcode" type="text" size="50" maxlength="50"></td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>


<h2>Test get_titles</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="get_titles">
	<table>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>

<h2>Test get_nationalities</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="get_nationalities">
	<table>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>

<h2>Test get_external_jobs_sectors</h2>
<form name="form" method="post" action="index.php">
	<input type="hidden" name="action" value="get_external_jobs_sectors">
	<table>
	<tr>
		<td colspan="3"><input type="submit" name="boton" value="Send"></td>
	</tr>
	</table>
</form>

</body>
</html>
