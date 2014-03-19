<?php

	echo '<h1>To demo simple Ajax with php </h1>';
	$test = ['Dell',
			'Acer',
			'HP',
			'Fujitsu',
			'Apple'
			]
			
?>

<form name="sample">
		<select name="company">
			<?php foreach ($test as $company)
			{ ?>
			<option value=<?php echo "'$company'"?> ><?php echo "'$company'"?></option>
			<?php }?>
		</select>
		<br/>
		<label>Assignable</label>
		<input name="ass1" value="" >
		
		<label>Assiged</label>
		<input name="ass2" value="" >
		
</form>
<script>
	
	var reqListener = function(){
		
	}
	
	var onReq = new XMLHttpRequest();
	onReq.onload = reqListener;
	onReq.open("get", "/get_data.php", true);
	onReq.send();
</script>
