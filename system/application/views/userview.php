<?php $this->load->view('header'); ?>
<body class="l2" onload="updateAll();">
	<div id="container">
		<?php $this->load->view('nav'); ?>
		<div id="primary">
			<?php 
			foreach($jobs as $job): 
			?>
			<div class="job_box">
				<div id="jobdiv-<?php echo $job->id; ?>">
					<h3><?php echo $job->name; ?></h3>
					<div id="ajaxdiv-<?php echo $job->id; ?>">
						Loading users...
					</div>
				</div>
			</div>
			<?php
			endforeach;
			?>
		</div>
		<div id="secondary">
			<?php
			foreach($users as $row):
			?>
				<p id="p-<?php echo $row->id; ?>" style="width:0;" class="user" alt="<?php echo $row->id; ?>"><?php echo $row->name; ?></p>
			<?php 
			endforeach; 
			?>
		</div>
	</div>
	
	<div id="add_user">
		
	</div>
	
	<?php
	foreach($users as $row):
		echo $this->ajax->dragable_element('p-'.$row->id, array('revert'=>'true'));
	endforeach;
	?>
	
	<script type="text/javascript">	
		<?php 
		foreach($jobs as $job):
		?>
		Droppables.add('jobdiv-<?php echo $job->id; ?>', {
			accept: 'user',
			onDrop: function(element, droppableElement) { 
				$(droppableElement.id).highlight();
				new Ajax.Updater('add_user', '/index.php/user/addUserToJob/' + element.innerHTML + '/<?php echo $job->id; ?>', { method: 'get' });
				updateAll();
				new Ajax.Updater('ajaxdiv-' + droppableElement.id, '/index.php/user/jobDisplay/<?php echo $job->id; ?>', { method: 'get' });
			}
		});
		<?php
		endforeach;
		?>
		
		function updateAll() {
			<?php
			foreach($jobs as $job):
			?>
			new Ajax.Updater('ajaxdiv-<?php echo $job->id; ?>', '/index.php/user/jobDisplay/<?php echo $job->id; ?>', { method: 'get' });
			<?php
			endforeach;
			?>
		}
	</script>
</body>
</html>