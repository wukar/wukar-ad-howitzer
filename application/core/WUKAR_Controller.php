<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	THe Bootstrap Core Controller
*/
include APPPATH.'/core/WUKAR_Template.php'; //the main template layout
include APPPATH.'/core/WUKAR_Developer.php'; //the Core class for the developer page

class WUKAR_Controller Extends WUKAR_Template{

	public function __construct(){
		parent::__construct();
	}	
}