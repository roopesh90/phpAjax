<?php

	echo '<h1>To demo simple Ajax with php </h1>';
	$test = ['Dell',
			'Acer',
			'HP',
			'Fujitsu',
			'Apple'];
			
	$user_id = "56ed8Ui";
?>
<form name="sample">
		Select a company from below<br/>
		<select name="company" onchange="companyChanged(this.value)">
			<option value="init">&lt; select a value from below &gt;</option>
			<?php foreach ($test as $company_name)
			{ ?>
			<option value=<?php echo "'$company_name'"?> ><?php echo "'$company_name'"?></option>
			<?php }?>
		</select>
		<br/>
		<label>Assignable</label>
		<input name="ass1" value="" >
		
		<label>Assiged</label>
		<input name="ass2" value="" >
		
</form>

<p id="loading">Loading...</p>

<script>
	var reqListener = function(){
		//alert(onReq.responseText);
		result = onReq.responseText;
		console.log(onReq.responseText);
		
	}
	
	var onReq = new XMLHttpRequest();
	onReq.onload = reqListener;
	/*
	 *Always remember, sending data to the server
	 *using ajax is done preferable through post
	 *otherwise the .send() will not yeild. 
	 *For get, pass data through the url itself
	 *with the help of '&'
	 *Refer: http://www.w3schools.com/ajax/ajax_xmlhttprequest_send.asp
	 */
	onReq.open("POST", "get_data.php", true);
	onReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	var companyChanged = function(company){
		document.forms.sample.ass1.value=""
		document.forms.sample.ass2.value=""
		
		if(company != "init")
		{
			var user_id = <?php echo "'$user_id'"?>;
			alert(company);
			onReq.send("id="+user_id+"&company="+company);
		}
	}
	
	var loading = function(){
		
	}
</script>
