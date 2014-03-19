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

<p id="loading" class="">Loading...</p>

<script>
	var reqListener = function(){
		//alert(onReq.responseText);
		result = onReq.responseText;
		console.log(onReq.responseText);
		
		loading();
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
	
	var companyChanged = function(company){
		loading();
		document.forms.sample.ass1.value=""
		document.forms.sample.ass2.value=""
		
		if(company != "init")
		{
			onReq.open("POST", "get_data.php", true);
			onReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
			var user_id = <?php echo "'$user_id'"?>;
			setTimeout(	function(){
				onReq.send("id="+user_id+"&company="+company);
				}, 800);
		}
	}
	
	var loading = function(){
		var anim_elem = document.getElementById('loading');
		anim_elem.className = anim_elem.className == ""? "activate" : "";
	}
</script>

<style>
	#loading{
		font-size: 24px;
		font-weight: bold;
		opacity: 0;
	}
	
	.activate {
		-webkit-animation-name: blinker;
		-webkit-animation-duration: 0.5s;
		-webkit-animation-timing-function: linear;
		-webkit-animation-iteration-count: infinite;
		
		-moz-animation-name: blinker;
		-moz-animation-duration: 1s;
		-moz-animation-timing-function: linear;
		-moz-animation-iteration-count: infinite;
		
		animation-name: blinker;
		animation-duration: 1s;
		animation-timing-function: linear;
		animation-iteration-count: infinite;
	}

	@-moz-keyframes blinker {  
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}

	@-webkit-keyframes blinker {  
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}

	@keyframes blinker {  
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}
</style>
