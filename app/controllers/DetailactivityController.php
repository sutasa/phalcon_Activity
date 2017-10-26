<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class DetailactivityController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for detailactivity
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Detailactivity', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idDetailactivity";

        $detailactivity = Detailactivity::find($parameters);
        if (count($detailactivity) == 0) {
            $this->flash->notice("The search did not find any detailactivity");

            $this->dispatcher->forward([
                "controller" => "detailactivity",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $detailactivity,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a detailactivity
     *
     * @param string $idDetailactivity
     */
    public function editAction($idDetailactivity)
    {
        if (!$this->request->isPost()) {

            $detailactivity = Detailactivity::findFirstByidDetailactivity($idDetailactivity);
            if (!$detailactivity) {
                $this->flash->error("detailactivity was not found");

                $this->dispatcher->forward([
                    'controller' => "detailactivity",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idDetailactivity = $detailactivity->idDetailactivity;

            $this->tag->setDefault("idDetailactivity", $detailactivity->idDetailactivity);
            $this->tag->setDefault("idStudent", $detailactivity->idStudent);
            $this->tag->setDefault("idActivity", $detailactivity->idActivity);
            
        }
    }

    /**
     * Creates a new detailactivity
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'index'
            ]);

            return;
        }

        $detailactivity = new Detailactivity();
        $detailactivity->idStudent = $this->request->getPost("idStudent");
        $detailactivity->idActivity = $this->request->getPost("idActivity");
        

        if (!$detailactivity->save()) {
            foreach ($detailactivity->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("detailactivity was created successfully");

        $this->dispatcher->forward([
            'controller' => "detailactivity",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a detailactivity edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'index'
            ]);

            return;
        }

        $idDetailactivity = $this->request->getPost("idDetailactivity");
        $detailactivity = Detailactivity::findFirstByidDetailactivity($idDetailactivity);

        if (!$detailactivity) {
            $this->flash->error("detailactivity does not exist " . $idDetailactivity);

            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'index'
            ]);

            return;
        }

        $detailactivity->idStudent = $this->request->getPost("idStudent");
        $detailactivity->idActivity = $this->request->getPost("idActivity");
        

        if (!$detailactivity->save()) {

            foreach ($detailactivity->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'edit',
                'params' => [$detailactivity->idDetailactivity]
            ]);

            return;
        }

        $this->flash->success("detailactivity was updated successfully");

        $this->dispatcher->forward([
            'controller' => "detailactivity",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a detailactivity
     *
     * @param string $idDetailactivity
     */
    public function deleteAction($idDetailactivity)
    {
        $detailactivity = Detailactivity::findFirstByidDetailactivity($idDetailactivity);
        if (!$detailactivity) {
            $this->flash->error("detailactivity was not found");

            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'index'
            ]);

            return;
        }

        if (!$detailactivity->delete()) {

            foreach ($detailactivity->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "detailactivity",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("detailactivity was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "detailactivity",
            'action' => "index"
        ]);
    }

}
