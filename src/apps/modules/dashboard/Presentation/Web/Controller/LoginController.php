<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Application\Request\LoginRequest;
use Its\Example\Dashboard\Core\Application\Service\LoginService;
use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    protected $login_service;

    public function initialize()
    {
        /** @var LoginService */
        $this->login_service = $this->di->get('loginService');
        $this->view->setVar('committee_info', $this->session->get('committee_info'));

    }

    public function indexAction()
    {
        if ($this->request->isPost()) {
            $request = new LoginRequest;
            $request->username = $this->request->getPost('username');
            $request->password = $this->request->getPost('password');

            $committee_info = $this->login_service->execute($request);
            $this->session->set('committee_info', $committee_info);
            $this->response->redirect('/');
        }
        $this->view->pick('login/index');
    }
}