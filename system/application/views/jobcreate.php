<?php $this->load->view('header'); ?>
<body>
	<?php
	echo $this->validation->error_string;
	echo form_open('jobs/create');
	echo "<label for='number'>Job Number: </label>".form_input('number')."<br/>";
	echo "<label for='name'>Name: </label>".form_input('name')."<br/>";
	echo "<label for='description'>Description: </label><br/>".form_textarea('description')."<br/>";
	echo form_submit('submit', 'Submit');
	echo form_close();
	?>
</body>
</html>