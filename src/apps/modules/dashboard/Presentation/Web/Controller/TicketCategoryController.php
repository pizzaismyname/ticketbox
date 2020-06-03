<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Application\Service\ListTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Request\CreateTicketCategoryRequest;
use Its\Example\Dashboard\Core\Application\Service\CreateTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Request\EditTicketCategoryRequest;
use Its\Example\Dashboard\Core\Application\Service\EditTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Request\DeleteTicketCategoryRequest;
use Its\Example\Dashboard\Core\Application\Service\DeleteTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Request\ViewTicketCategoryRequest;
use Its\Example\Dashboard\Core\Application\Service\ViewTicketCategoryService;
use Phalcon\Mvc\Controller;

class TicketCategoryController extends Controller
{
    protected $list_service;
    protected $create_service;
    protected $edit_service;
    protected $delete_service;
    protected $view_service;

    public function initialize()
    {
        /** @var ListTicketCategoryService */
        $this->list_service = $this->di->get('listTicketCategoryService');
        /** @var CreateTicketCategoryService */
        $this->create_service = $this->di->get('createTicketCategoryService');
        /** @var EditTicketCategoryService */
        $this->edit_service = $this->di->get('editTicketCategoryService');
        /** @var DeleteTicketCategoryService */
        $this->delete_service = $this->di->get('deleteTicketCategoryService');
        /** @var ViewTicketCategoryService */
        $this->view_service = $this->di->get('viewTicketCategoryService');
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
        $ticket_categories = $this->list_service->execute();
        $this->view->setVar('ticket_categories', $ticket_categories);
        $this->view->pick('ticketcategory/index');
    }

    public function createAction()
    {
        if ($this->request->isPost()) {
            $request = new CreateTicketCategoryRequest;
            $request->type = $this->request->getPost('type');
            $request->price = $this->request->getPost('price');
            $request->total_amount = $this->request->getPost('total_amount');

            $this->create_service->execute($request);
            $this->response->redirect('/ticketcategory/index');
        }
        $this->view->pick('ticketcategory/create');
    }

    public function editAction()
    {
        $ticket_category_info = new ViewTicketCategoryRequest;
        $ticket_category_info->ticket_category_id = $this->dispatcher->getParam('id');

        $ticket_category = $this->view_service->execute($ticket_category_info);

        if ($this->request->isPost()) {
            $request = new EditTicketCategoryRequest;
            $request->ticket_category_id = $this->dispatcher->getParam('id');
            $request->type = $this->request->getPost('type');
            $request->price = $this->request->getPost('price');
            $request->total_amount = $this->request->getPost('total_amount');

            $this->edit_service->execute($request);
            $this->response->redirect('/ticketcategory/index');
        }

        $this->view->setVar('ticket_category', $ticket_category);
        $this->view->pick('ticketcategory/edit');
    }

    public function deleteAction()
    {
        if ($this->request->isPost()) {
            $request = new DeleteTicketCategoryRequest;
            $request->ticket_category_id = $this->request->getPost('id');

            $this->delete_service->execute($request);
            $this->response->redirect('/ticketcategory/index');
        }
    }
}
