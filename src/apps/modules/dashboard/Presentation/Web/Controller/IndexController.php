<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->setVar('committee_info', $this->session->get('committee_info'));
        $this->view->pick('index/index');
    }
}