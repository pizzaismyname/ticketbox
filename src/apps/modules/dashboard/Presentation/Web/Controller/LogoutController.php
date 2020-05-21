<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Application\Response\CommitteeInfo;
use Phalcon\Mvc\Controller;

class LogoutController extends Controller
{
    /** @var CommitteeInfo */
    protected $committee_info;

    public function beforeExecuteRoute()
    {
        if (!$this->session->has('committee_info')) {
            $this->response->redirect("/login")->send();
            return false;
        }
        $this->committee_info = $this->session->get('committee_info');
        return true;
    }

    public function indexAction()
    {
        $this->session->destroy('committee_info');
        $this->response->redirect('/login');
    }
}