<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function __construct() {
            parent::__construct();
            @session_start();
            if(empty ($_SESSION['user_web'])){
                redirect('user/login');
            }
            $this->load->library('templates');
        }
        
        public function bookings() {
            $data = array('data'=>'','msg'=>'','status'=>'');
            $this->load->model('utilities');
            $reqdata = $this->input->post();
            $reqdata['bookedby'] = $_SESSION['user_web']->user_id;
            $results = $this->utilities->getAppointmentsByMe($reqdata);
            $data['bookings'] = $results;
            //$this->load->view('doctor/bookings',$data);
            $this->templates->load('doctor/bookings',$data);
        }
        
        public function appointments() {
            if(empty ($_SESSION['user_web'])){
                redirect('user/login');
            }
            $data = array('data'=>'','msg'=>'','status'=>'');
            //$this->load->view('doctor/appointments',$data);
            $this->load->model('utilities');
            $reqdata = $this->input->post();
            $reqdata['bookedfor'] = $_SESSION['user_web']->user_id;
            $results = $this->utilities->getAppointmentsForMe($reqdata);
            $data['bookings'] = $results;
            //$this->load->view('doctor/bookings',$data);
            $this->templates->load('doctor/appointments',$data);
        }
        
       public function googlemap() {
            $data = array('data'=>'','msg'=>'','status'=>'');
            //$this->load->view('doctor/appointments',$data);
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyBwSX_c3zz8Hrfe19owkZti5VKbfDZuaxo';

            //load the Curl library
  $this->load->library('Curl');

//load the Curl library
  //$this->load->library('Curl');

  //Request using POST Method
   //$url = 'http://postexample.com/json.php';
   //echo $this->curl->simple_post($url, false, array(CURLOPT_USERAGENT => true));

   //Request using GET Method
   $get_url = $url;
   echo $this->curl->simple_get($get_url, false, array(CURLOPT_USERAGENT => true));
   echo 'doctor/googlemap';
            $this->load->view('doctor/googlemap',$data);
        }
}
