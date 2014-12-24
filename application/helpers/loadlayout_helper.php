<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('loadLayout')){
	function loadLayout($vars = array()) {
		$callers = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
		$dir  = strtolower($callers[1]['class']);
		$view = strtolower($callers[1]['function']);
		$CI =& get_instance();
		$CI->load->view("header", $vars);
		$CI->load->view("flash");
		$CI->load->view("$dir/$view");
		$CI->load->view("affix");
		$CI->load->view("footer");
	}
}

if ( ! function_exists('loadLayoutView')){
	function loadLayoutView($vars = array(), $view) {
		$CI =& get_instance();
		$CI->load->view("header", $vars);
		$CI->load->view("flash");
		$CI->load->view($view);
		$CI->load->view("affix");
		$CI->load->view("footer");
	}
}