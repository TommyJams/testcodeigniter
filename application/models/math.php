<?php

Class Math extends CI_Model{

	public function add($val1, $val2){
	//	return (1 + 1);
		return ($val1 + $val2);
	}

	public function sub($val1, $val2){
	//	return (1 + 1);
		return ($val2 - $val1);
	}
}