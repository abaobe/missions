<?php $this->load->view('header'); ?>
<body class="l2">
	<div id="container">
		<?php $this->load->view('nav'); ?>
		<div id="primary">
			<?php
			foreach($jobs as $row):
			?>
			<div id="tr-<?php echo $row->id; ?>" class="jobs">
				<h3><a href="#" onclick="Effect.toggle('info-<?php echo $row->id; ?>', 'blind', { duration: 0.3 }); return false;"><?php echo $row->job_number; ?></a></h3>
				<div id="info-<?php echo $row->id; ?>" class="job_desc_div" style="display:none;">
					<div class="jobtext">
						<p>Name: <?php echo $row->name; ?></p>
						<p>Description: <?php echo $row->description; ?></p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div id="secondary">
			<p><a href="jobs/create">Create New Job</a></p>
		</div>
	</div>
</body>
</html>