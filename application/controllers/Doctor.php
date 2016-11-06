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
            if(empty ($_SESSION['user'])){
                redirect('user/login');
            }
        }
        
        public function bookings() {
            $data = array('data'=>'','msg'=>'','status'=>'');
            $this->load->model('utilities');
            $reqdata = $this->input->post();
            $reqdata['bookedby'] = $_SESSION['user']->id;
            $results = $this->utilities->getAppointmentsByMe($reqdata);
            $data['bookings'] = $results;
            $this->load->view('doctor/bookings',$data);
        }
        
        public function appointments() {
            $data = array('data'=>'','msg'=>'','status'=>'');
            $this->load->view('doctor/appointments',$data);
        }
        
}
