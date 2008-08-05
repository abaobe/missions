<?php
class User extends Controller {

	function index()
	{
		$this->load->library('parser');
		
		function addUserToJob($user, $job){
			$info = array(
							'user_id' => $user ,
							'job_id' => $job
						);
			$this->db->insert('work', $info);
		}
		
		$query = $this->db->get('users');
		$users = array();
		foreach ($query->result() as $row)
		{
		    $users[] = $row;
		}
		$workquery = $this->db->get('work');
		$work = array();
		foreach ($workquery->result() as $row)
		{
		    $work[] = $row;
		}
		$jobquery = $this->db->get('jobs');
		$jobs = array();
		foreach ($jobquery->result() as $row)
		{
		    $jobs[] = $row;
		}
		$data['work'] = $work;
		$data['jobs'] = $jobs;
		$data['users'] = $users;
		$data['title'] = "User List";
		
		$this->parser->parse('userview', $data);
	}
	
	function in()
	{
		$user = addslashes($_POST['user']); 
		$pass = addslashes($_POST['pass']); 

		$result = mysql_query("SELECT count(name) FROM users WHERE pass='$pass' AND name='$user'") or die("Couldn't query the user-database."); 
		$num = mysql_result($result, 0); 

		if (!$num) {
			echo 'Fail';
		} 
		else {
			$newdata = array(
							'username'	=>	$user,
							'logged_in'	=>	TRUE
							);
			$this->session->set_userdata($newdata);
			header('Location: /index.php');
		}
	}
	
	function out()
	{
		$this->session->sess_destroy();
		header('Location: /index.php');
	}
	
	function newuser()
	{
		//$this->load->view('usercreate');
		$this->load->helper(array('form', 'url'));

		$this->load->library('validation');
		
		$rules['name']	= "trim|required|min_length[4]|max_length[20]|xss_clean";
		$rules['pass']	= "trim|required|min_length[4]|max_length[20]|matches[pass2]|md5";
		$rules['pass2']	= "trim|required";

		$this->validation->set_rules($rules);

		if ($this->validation->run() == FALSE)
		{
			$this->load->view('usercreate');
		}
		else
		{
			if(mysql_query("INSERT INTO users SET name = '$_POST[name]', pass = '$_POST[pass]'")) {
				echo 'user created';
			} 
			else {
				echo 'error: '.mysql_error();
			}
		}
	}
	
	function create()
	{
		$this->load->helper(array('form', '/index.php/user/newuser'));

		$this->load->library('validation');
		
		$rules['username']	= "required";
		$rules['password']	= "required";
		$rules['passconf']	= "required";
		$rules['email']	 = "required";

		$this->validation->set_rules($rules);

		if ($this->validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			if(mysql_query("INSERT INTO users SET name = '$_POST[name]', pass = '$_POST[pass]'")) {
				echo 'user created';
			} 
			else {
				echo 'error: '.mysql_error();
			}
		}
	}
	
	function jobDisplay($jobid)
	{
		$this->load->view('header');
		$workresult = $this->db->query('select * from work where job_id = '.$jobid.';');
	    # $workresult = $this->db->get_where('work', array('job_id' =>$jobid));
	    foreach($workresult->result() as $result)
	    {
			$userresult = $this->db->query('select * from users where id = '.$result->user_id.';');
	    	# $userresult = $this->db->get_where('users', array('id' = $work->work_id));
			foreach($userresult->result() as $user)
			{
				echo "<p>".$user->name."</p>";
			}
	    }
	}
	
}
?>