<?php
class Db extends Controller {
	
	function index()
	{
		echo "Continue at your own risk...";
	}
	
	function setup()
	{
		$user_table_create = 'CREATE TABLE users (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name TEXT NOT NULL,
			pass CHAR(32) NOT NULL,
			rank INT NOT NULL REFERENCES rank(id)
			)';
		if (mysql_query($user_table_create)) {
			echo "table created successfully";
		}
		else {
			exit('<p>Error creating table: ' . 
			     mysql_error() . '</p>');
		}
		
		$job_table_create = 'CREATE TABLE jobs (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			job_number TEXT NOT NULL,
			name TEXT NOT NULL,
			description TEXT NOT NULL
			)';
		if (mysql_query($job_table_create)) {
			echo "table created successfully";
		}
		else {
			exit('<p>Error creating table: ' . mysql_error() . '</p>');
		}
		
		$work_table_create = 'CREATE TABLE work (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			user_id INT NOT NULL REFERENCES users(id),
			job_id INT NOT NULL REFERENCES jobs(id)
			)';
		if (mysql_query($work_table_create)) {
			echo "table created successfully";
		}
		else {
			exit('<p>Error creating table: ' . mysql_error() . '</p>');
		}
		
		$rank_table_create = 'CREATE TABLE ranks (
			id INT NOT NULL PRIMARY KEY,
			name TEXT NOT NULL
			)';
		if (mysql_query($rank_table_create)) {
			echo "table created successfully";
		}
		else {
			exit('<p>Error creating table: ' . mysql_error() . '</p>');
		}
		
		$admin_rank_create = 'INSERT INTO ranks SET
			id = "1",
			name = "admin"
			';
		if (mysql_query($admin_rank_create)) {
			echo "table created successfully";
		}
		else {
			exit('<p>Error creating table: ' . mysql_error() . '</p>');
		}
		
		$user_rank_create = 'INSERT INTO ranks SET
			id = "2",
			name = "user"
			';
		if (mysql_query($user_rank_create)) {
			echo "table created successfully";
		}
		else {
			exit('<p>Error creating table: ' . mysql_error() . '</p>');
		}
	}
	
	function delete()
	{
		
	}
	
}
?>