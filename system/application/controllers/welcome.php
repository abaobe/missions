<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{	
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('parser');
		$this->load->library('validation');
		$this->load->library('users');
		
		$data['title'] = 'Welcome to Unnamed';
		
		$rules['user']	= "trim|required|xss_clean";
		$rules['pass']	= "trim|required|md5";
		
		$this->validation->set_rules($rules);

		if ($this->validation->run() == FALSE)
		{
			//$this->load->view('welcome_message');
			$this->parser->parse('welcome_message', $data);
		}
		else
		{
			$user = addslashes($_POST['user']);
			$pass = $_POST['pass'];

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
				//$this->load->view('welcome_message');
				$this->parser->parse('welcome_message', $data);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */