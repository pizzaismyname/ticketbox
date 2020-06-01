<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Application\Service\ListCommitteeService;
use Its\Example\Dashboard\Core\Application\Request\CreateCommitteeRequest;
use Its\Example\Dashboard\Core\Application\Service\CreateCommitteeService;
use Its\Example\Dashboard\Core\Application\Request\EditCommitteeRequest;
use Its\Example\Dashboard\Core\Application\Service\EditCommitteeService;
use Its\Example\Dashboard\Core\Application\Request\DeleteCommitteeRequest;
use Its\Example\Dashboard\Core\Application\Service\DeleteCommitteeService;
use Its\Example\Dashboard\Core\Application\Request\ViewCommitteeRequest;
use Its\Example\Dashboard\Core\Application\Service\ViewCommitteeService;
use Phalcon\Mvc\Controller;

class CommitteeController extends Controller
{
    protected $list_service;
    protected $create_service;
    protected $edit_service;
    protected $delete_service;
    protected $view_service;

    public function initialize()
    {
        /** @var ListCommitteeService */
        $this->list_service = $this->di->get('listCommitteeService');
        /** @var CreateCommitteeService */
        $this->create_service = $this->di->get('createCommitteeService');
        /** @var EditCommitteeService */
        $this->edit_service = $this->di->get('editCommitteeService');
        /** @var DeleteCommitteeService */
        $this->delete_service = $this->di->get('deleteCommitteeService');
        /** @var ViewCommitteeService */
        $this->view_service = $this->di->get('viewCommitteeService');
        $this->view->setVar('committee_info', $this->session->get('committee_info'));
    }

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
        $committees = $this->list_service->execute();
        $this->view->setVar('committees', $committees);
        $this->view->pick('committee/index');
    }

    public function createAction()
    {
        if ($this->request->isPost()) {
            $request = new CreateCommitteeRequest;
            $request->username = $this->request->getPost('username');
            $request->password = $this->request->getPost('password');

            $this->create_service->execute($request);
            $this->response->redirect('/committee/index');
        }
        $this->view->pick('committee/create');
    }

    public function editAction()
    {
        $committee_info = new ViewCommitteeRequest;
        $committee_info->committee_id = $this->dispatcher->getParam('id');

        $committee = $this->view_service->execute($committee_info);

        if ($this->request->isPost()) {
            $request = new EditCommitteeRequest;
            $request->committee_id = $this->dispatcher->getParam('id');
            $request->username = $this->request->getPost('username');
            $request->password = $this->request->getPost('password');

            $this->edit_service->execute($request);
            $this->response->redirect('/committee/index');
        }

        $this->view->setVar('committee', $committee);
        $this->view->pick('committee/edit');
    }

    public function deleteAction()
    {
        if ($this->request->isPost()) {
            $request = new DeleteCommitteeRequest;
            $request->committee_id = $this->request->getPost('id');

            $this->delete_service->execute($request);
            $this->response->redirect('/committee/index');
        }
    }
}
