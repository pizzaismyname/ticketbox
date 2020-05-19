<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Application\Response\UserInfo;
use Phalcon\Mvc\Controller;

class LogoutController extends Controller
{
    /** @var UserInfo */
    protected $user_info;

    public function beforeExecuteRoute()
    {
        if (!$this->session->has('user_info')) {
            $this->response->redirect("/login")->send();
            return false;
        }
        $this->user_info = $this->session->get('user_info');
        return true;
    }

    public function indexAction()
    {
        $this->session->destroy('user_info');
        $this->response->redirect('/login');
    }
}