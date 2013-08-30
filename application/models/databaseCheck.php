<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class DatabaseCheck extends CI_Model{

	public function checkDb($val1, $val2){

		$query_check1 = $this->db->query('SELECT * FROM `$database`.`members` WHERE fb_id = '$fbid'');
		$result_check1 = mysql_query($query_check1);

		if(mysql_num_rows($result_check1) != 0)
		{
			$this->load->view('fbConnect1_view');						
		}
		else
		{	
			$query = "INSERT INTO `$database`.`members` (`id`, `type`, `actual_type`, `dob`, `name`, `username`, `fb_username`,`password`, `email`, `mobile`, `fb_id`, `city`, `state`,`country`, `about`, `gender`, `fb`, `status`, `job`, `user`, `ip`, `time`) 
			    	VALUES (NULL, '$what', '$actual_type', '$birth', '$organization', '$username', '$fb_username', '$password', '$email', '$phone', '$fbid', '$city', '$state', '$country', '$about', '$gender', '$fb', '1', '$job', '$fbid', '$ip', CURRENT_TIMESTAMP)";
		}
		