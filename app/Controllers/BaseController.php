<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');
    }

    protected $global = [];

    public function loadView($viewName = "",$pageInfo = null, $headerInfo = [],  $footerInfo = []){
        echo view('menu', $headerInfo);
        echo view($viewName, $pageInfo);
        echo view('footer', $footerInfo);
    }


    public function loadDashboardView($viewName = "",$pageInfo = null, $headerInfo = [],  $footerInfo = []){
        //echo view('menu', $headerInfo);
        echo view('dashboard/'.$viewName, $pageInfo);
        //echo view('footer', $footerInfo);
    }


    public function loadAdminView($viewName = "",$pageInfo = null, $headerInfo = [],  $footerInfo = []){
        echo view('adminpanel/includes/header', $headerInfo);
        echo view('adminpanel/'.$viewName, $pageInfo);
        echo view('adminpanel/includes/footer', $footerInfo);
    }


    public function isLoggedIn(){
        $this->session = session();
        $isLoggedIn = $this->session->get('isLoggedIn');
        if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
            redirect()->to(base_url('admin/login'))->with('error', 'Please log in first.')->send();
            exit;
        }
    }
    
    public function isUserLoggedIn(){
        $this->session = session();
        $isUserLoggedIn = $this->session->get('isUserLoggedIn');
        if (! isset ( $isUserLoggedIn ) || $isUserLoggedIn != TRUE) {
            redirect()->to(base_url('login'))->with('error', 'Please log in first.')->send();
            exit;
        }
    }
}
