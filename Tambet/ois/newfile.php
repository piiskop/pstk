
<?php

include ('header_opetaja.php');

?>

<meta charset="utf-8"/>



<html>


<TABLE


border="1">
        

<TR><TH>Õpilased<TH>Puudumised
<br>
<TR><th>Martin<TH><SELECT>
			<option value="opilane_kohal">+</option>
			<option value="opilane_vaba">V</option>
			<option value="opilane_pohjusetta">P</option>
<tr><th>Tõnn<TH><SELECT>
			<option value="opilane_kohal">+</option>
			<option value="opilane_vaba">V</option>
			<option value="opilane_pohjusetta">P</option>
<tr><th>Tambet<TH><SELECT>
			<option value="opilane_kohal">+</option>
			<option value="opilane_vaba">V</option>
			<option value="opilane_pohjusetta">P</option>			

</table>			
			
<br/>			

<table>			
			
<TR><TH><textarea rows="4" cols="40"></textarea>			
<TR><TH><textarea rows="4" cols="40"></textarea>			
		
</table>

<input type="submit" value="Salvesta" name="salvesta_puudumised_tund">
<input type="submit" value="Tagasi" name="Back_btn">



</html>


<?php

include('footer.php');

?>