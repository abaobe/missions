<?php $this->load->view('header'); ?>
<h2>Ajax test</h2>
<div id="ajax">Content loading...</div>
<a href="#" onclick="ajax();">Update</a>

<script type="text/javascript">
function ajax(){
	new Ajax.Updater('ajax', '/index.php/jobs', { method: 'get' });
}
</script>