<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ubers extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
		$this->load->view('/index');
	}

	public function get_price(){
		// var_dump($this->input->post('latitude'));
		// echo "I am in get_price function";
		// die();
		$baseURL = 'https://api.uber.com/v1/estimates/price';
		$start_lat = 47.8497021;
		$start_long = -122.2575377;
		$end_lat = 47.4502535;
		$end_long = -122.3110052;
		$token = 'OuwRproNQLfR_1XAhlxPnhnh-GzjCGHkpHn3_UKx';
		$targetURL = $baseURL.'?start_latitude='.$start_lat.'&start_longitude='.$start_long.'&end_latitude='.$end_lat.'&end_longitude='.$end_long.'&server_token='.$token;
		var_dump($targetURL);
		// die();
		$ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $targetURL);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    echo $data;
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
