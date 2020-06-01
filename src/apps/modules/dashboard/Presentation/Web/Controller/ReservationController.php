<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Application\Service\ListReservationService;
use Its\Example\Dashboard\Core\Application\Request\CreateReservationRequest;
use Its\Example\Dashboard\Core\Application\Service\CreateReservationService;
use Its\Example\Dashboard\Core\Application\Service\ListTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Request\ViewReservationStatusRequest;
use Its\Example\Dashboard\Core\Application\Request\ViewReservationStatusService;
use Its\Example\Dashboard\Core\Application\Request\VerifyReservationRequest;
use Its\Example\Dashboard\Core\Application\Request\VerifyReservationService;
use Its\Example\Dashboard\Core\Application\Request\DeleteReservationRequest;
use Its\Example\Dashboard\Core\Application\Request\DeleteReservationService;
use Phalcon\Mvc\Controller;

class ReservationController extends Controller
{
    protected $list_service;
    protected $reserve_service;
    protected $list_tc_service;
    protected $view_service;
    protected $verify_service;
    protected $delete_service;

    public function initialize()
    {
        /** @var ListReservationService */
        $this->list_service = $this->di->get('listReservationService');
        /** @var CreateReservationService */
        $this->reserve_service = $this->di->get('createReservationService');
        /** @var ListTicketCategoryService */
        $this->list_tc_service = $this->di->get('listTicketCategoryService');
        /** @var ViewReservationStatusService */
        $this->view_service = $this->di->get('viewReservationStatusService');
        /** @var VerifyReservationService */
        $this->verify_service = $this->di->get('verifyReservationService');
        /** @var DeleteReservationService */
        $this->delete_service = $this->di->get('deleteReservationService');
        $this->view->setVar('committee_info', $this->session->get('committee_info'));
    }

    public function indexAction()
    {
        if (!$this->session->has('committee_info')) {
            $this->response->redirect("/login")->send();
            return false;
        }
        $reservations = $this->list_service->execute();
        $this->view->setVar('reservations', $reservations);
        $this->view->pick('reservation/index');
    }

    public function createAction()
    {
        if ($this->request->isPost()) {
            $request = new CreateReservationRequest;
            $request->customer_name = $this->request->getPost('customer_name');
            $request->customer_email = $this->request->getPost('customer_email');
            $request->ticket_amount = $this->request->getPost('ticket_amount');
            $request->ticket_category_id = $this->request->getPost('ticket_category_id');

            $this->reserve_service->execute($request);
            $this->response->redirect('/');
        }

        $ticket_categories = $this->list_tc_service->execute();
        $this->view->setVar('ticket_categories', $ticket_categories);

        $this->view->pick('reservation/create');
    }

    public function viewAction()
    {
        if ($this->request->isPost()) {
            $request = new ViewReservationStatusRequest;
            $request->reservation_id = $this->request->getPost('id');

            $tickets = $this->view_service->execute($request);
            if ($tickets == NULL) {
                $this->flashSession->notice('Your booking is still being processed.');
            } else {
                $this->view->setVar('tickets', $tickets);
            }
        }
        $this->view->pick('reservation/view');
    }

    public function verifyAction()
    {
        if (!$this->session->has('committee_info')) {
            $this->response->redirect("/login")->send();
            return false;
        }
        if ($this->request->isPost()) {
            $request = new VerifyReservationRequest;
            $request->reservation_id = $this->request->getPost('id');
            $request->committee_id = $this->session->get('committee_info')->id;

            $this->verify_service->execute($request);
            $this->response->redirect('/reservation/index');
        }
    }

    public function cancelAction()
    {
        if (!$this->session->has('committee_info')) {
            $this->response->redirect("/login")->send();
            return false;
        }
        if ($this->request->isPost()) {
            $request = new DeleteReservationRequest;
            $request->reservation_id = $this->request->getPost('id');

            $this->delete_service->execute($request);
            $this->response->redirect('/reservation/index');
        }
    }
}
