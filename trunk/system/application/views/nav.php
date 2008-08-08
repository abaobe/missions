<div id="header">
	<div class="content">
		<ul class="tabs">
			<li><a href="/index.php">Home</a></li>
			<li><a href="/index.php/jobs">Jobs</a></li>
			<li><a href="/index.php/user">Users</a></li>
			<?php
			if ($this->session->userdata('username')) {
			echo '<li><a href="#">Settings</a></li>';
			echo '<li><a href="/index.php/user/out">Logout</a></li>';
			} else {
			echo '<li><a href="/index.php">Login</a></li>';
			}
			?>
		</ul>
	</div>
</div>