<?php $this->load->view('header'); ?>
<body onload="updateAll();">
	<div id="container">
		<?php $this->load->view('nav'); ?>
		<div id="sidebar">
			<?php
			foreach($users as $row):
			?>
				<p id="p-<?php echo $row->id; ?>" style="width:0;" class="user"><?php echo $row->name; ?></p>
			<?php 
			endforeach; 
			?>
		</div>
		<div id="content">
			<?php 
			foreach($jobs as $job): 
			?>
				<div id="jobdiv-<?php echo $job->id; ?>">
					<h3><?php echo $job->name; ?></h3>
					<div id="ajaxdiv-<?php echo $job->id; ?>">
						Loading users...
					</div>
				</div>
			<?php
			endforeach;
			?>
		</div>
	</div>
	<script type="text/javascript">
		<?php
		foreach($users as $row):
		?>
			new Draggable('p-<?php echo $row->id; ?>', {
				revert: true
			});
		<?php 
		endforeach; 
		
		foreach($jobs as $job):
		?>
		Droppables.add('jobdiv-<?php echo $job->id; ?>', {
			accept: 'user',
			onDrop: function() { 
				$('jobdiv-<?php echo $job->id; ?>').highlight();
				new Ajax.Updater('ajaxdiv-<?php echo $job->id; ?>', '/index.php/user/jobDisplay/<?php echo $job->id; ?>', { method: 'get' });
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