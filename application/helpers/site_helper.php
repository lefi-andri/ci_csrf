<?php
if (!function_exists('get_csrf_token')) {
	
	function get_csrf_token(){

		$ci = get_instance();
		if (!$ci->session->csrf_token) {
			$ci->session->csrf_token = hash('sha1', time());
		}

		return $ci->session->csrf_token;
	}
}

if (!function_exists('get_csrf_name')) {
	
	function get_csrf_name(){

		return "token";
	}
}

if (!function_exists('cek_csrf')) {
	
	function cek_csrf(){

		$ci = get_instance();

		if ($ci->input->post('token') != $ci->session->csrf_token or !$ci->input->post('token') or !$ci->session->csrf_token) {

    		$ci->session->unset_userdata('csrf_token');
    		$ci->output->set_status_header(403);
    		show_error('Error');
    		return false;
    	}
	}
}

if (!function_exists('csrf')) {
	
	function csrf(){

		return '<input type="hidden" name="'.get_csrf_name().'" value="'.get_csrf_token().'">';
	}
}

/* End of file site_helper.php */
/* Location: ./application/helpers/site_helper.php */