<?php
class Jobs extends Controller {
	
	function index()
	{
		$this->load->library('parser');
		
		$query = $this->db->get('jobs');
		$jobs = array();
		foreach ($query->result() as $row)
		{
		    $jobs[] = $row;
		}
		$data['jobs'] = $jobs;
		$data['title'] = "Jobs";

		//$this->load->view('jobview', $data);
		$this->parser->parse('jobview', $data);
	}
	
	function create()
	{
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper(array('form', 'url'));
		$this->load->library('validation');
		
		$data['title'] = "Create a new Job";
		
		$rules['number']	= "trim|required|min_length[4]|max_length[20]|xss_clean";
		$rules['name']	= "trim|required|min_length[4]|max_length[50]|xss_clean";
		$rules['description']	= "trim|required|xss_clean";
		
		$this->validation->set_rules($rules);
		
		if ($this->validation->run() == FALSE)
		{
			$this->parser->parse('jobcreate', $data);
		}
		else
		{
			if(mysql_query("INSERT INTO jobs SET name = '$_POST[name]', job_number = '$_POST[number]', description = '$_POST[description]'")) {
				header('Location: /index.php/jobs');
			} 
			else {
				echo 'error: '.mysql_error();
			}
		}
	}
	
	function ajax()
	{
		$this->load->view('ajaxtext');
	}
	
}
?>