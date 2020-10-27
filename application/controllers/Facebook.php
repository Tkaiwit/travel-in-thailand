<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {

	private $fb;
    public function __construct() {
        parent::__construct();
        $this->load->library("facebooksdk");
        $this->fb = $this->facebooksdk;
    }

	public function login(){
        $cb = "http://localhost/codeigniter/index.php/facebook/callback";
        $url = $this->fb->getLoginUrl($cb);
        echo "<a href='$url'>Sign in with Facebook</a>";
    }
    public function callback(){
        $act = $this->fb->getaccessToken();
        $data = $this->fb->getUserdata($act);
        print_r($data);
    }
}
