<?php
class Blog extends Controller {

	function index()
	{
		echo 'Hello World!';
		
		$query = $this->db->get('users');
		$users = array();
		foreach ($query->result() as $row)
		{
		    $users[] = $row->name;
		}
		$data['users'] = $users;
		
		$this->load->view('blogview', $data);
	}
}
?>