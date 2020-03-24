<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
class Welcome extends CI_Controller {

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

		log_message('error','Some variable did not contain a value.');
		$this->load->view('welcome_message');
	}

	function error($page, $msg){        
        $logger = new Logger($page);
        $logger->pushHandler(new StreamHandler('log/error.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());
        $logger->error(': '.$msg);
    }

    function info($page, $msg){ 
        $logger = new Logger($page);
        $logger->pushHandler(new StreamHandler('log/info.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());
        $logger->info(': '.$msg);
    }

    function warning($page, $msg){
        $logger = new Logger($page);
        $logger->pushHandler(new StreamHandler('log/warning.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());
        $logger->warning(': '.$msg);
    }
}
