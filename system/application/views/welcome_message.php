<?php $this->load->view('header'); ?>
<body class="l2">
	<div id="container">
		<?php $this->load->view('nav'); ?>
		<div id="primary">
			<div class="content">
				<h1>Welcome</h1>
			</div>
		</div>
		<div id="secondary">
			<div class="content">
				<?php
					if ($this->session->userdata('username')) {
						echo '<p>Welcome '.$this->session->userdata('username').'.</p>';
					} else {
						echo '<div id="login_form">';
						echo $this->validation->error_string;
						$this->load->helper('form');
						echo form_open();
						echo "<label for='user'>Username: </label>".form_input('user')."<br/>";
						echo "<label for='pass'>Password: </label>".form_password('pass')."<br/>";
						echo form_submit('submit', 'Submit');
						echo form_close();
						echo '</div>';
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>