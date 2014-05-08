<html>
	<head>
		<script type="text/javascript" src="<?php echo base_url();?>html/js/jquery.js" ></script>
	</head>

	<body>
		<div>
			<form id="signFrm" name="signFrm" method="POST" action="" novalidate="novalidate">
				<div class = 'loginLabel'>
					<label>User Name  </label>
					<input id="username" class="signin" type="text" tabindex="1" size="30" value="" name="username">
				</div>
				<div class = 'loginLabel'>
					<label>Password  </label>
					<input id="password" class="signin" type="password" tabindex="2" size="30" name="password">
				</div>
				<input id='submit' type='submit' value='Login' name='Submit'>
			</form>

		</div>
	</body>
</html>

<script>		
	$("#submit").click(function() {
		if($('#username').val() == '' || $('#password').val() == ''){
			alert('User Name or Password Cannot be empty');
			return false;
		}		
		$( "#signFrm" ).submit();		
	});
</script>
