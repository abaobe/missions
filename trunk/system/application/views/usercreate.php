<?php $this->load->view('header'); ?>
<body>
	<?php echo $this->validation->error_string; ?>
	<?php $this->load->helper('form');
		echo form_open('user/newuser');
		echo form_input('name', 'Name')."<br/>";
		echo form_password('pass')."<br/>";
		echo form_password('pass2')."<br/>";
		echo form_submit('submit', 'Submit');
		echo form_close();
	?>
	
	
	<!--<form method="post" action="/index.php/user/create">
		Name: <input type="text" id="name" name="name" /><br/>
		Password: <input type="password" id="pass" name="pass" /><br/>
		Re-enter password: <input type="password" id="pass2" name="pass2" /><br/>
		<input type="submit" value="Submit" />
	</form>-->
</body>
</html>