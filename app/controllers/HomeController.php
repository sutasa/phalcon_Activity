<?php
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Criteria;


class HomeController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        
      $numberPage = $this->request->getQuery("page", "int");

      $parameters["order"] = "StartDate DESC";
      $activity = activity::find($parameters);
      $paginator = new Paginator([
        'data' => $activity,
        'limit'=> 9,
        'page' => $numberPage
      ]);
      $this->view->page = $paginator->getPaginate();
    }
    

    public function searchAcAction()
    {
       
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Activity', $_POST);
            $this->persistent->parameters = $query->getParams();
         } else {
             
             $numberPage = $this->request->getQuery("page", "int");
             
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }

        $parameters["order"] = "idActivity";
        $activity = Activity::find($parameters);


        if (count($activity) == 0) {
            $this->flash->notice("The search did not find any activity");

            $this->dispatcher->forward([
                "controller" => "activity",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $activity,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
      }


    public function searchHistoryAction()
    {
        $numberPage = 1;
        $id = $this->request->getPost("idStudent");
        $student = Student::findFirst(
            [
                "idStudent = '" . $id . "'"  
            ]
        );
        if($student){
            $this->view->data = 1;
            $this->view->abc = $student->idStudent." ".$student->FirstName." ".$student->LastName."";
            $detail = Detailactivity::Find(
                [
                    "idStudent = '" . $id . "'"  
                ]
            );
            $paginator = new Paginator([
                'data' => $detail,
                'limit'=> 10,
                'page' => $numberPage
            ]);


            $this->view->page = $paginator->getPaginate();


        }else{
            $this->view->abc = "รหัสนักศึกษาไม่ถูกต้อง";
            $this->view->data = 0;
        }


        // $paginator = new Paginator([
        //     'data' => $detailactivity,
        //     'limit'=> 10,
        //     'page' => $numberPage
        // ]);

        // $this->view->page = $paginator->getPaginate();



    }

    public function detailAction($id)
    { 
        $Activity = Activity::findFirst($id);
        $this->view->activity = $Activity;

         $location = Location::findFirst(
                [
                    "idLocation = '" . $Activity->Location_idLocation . "'"  
                ]
            );

         $this->view->location = $location;

         $type = Type::findFirst(
                [
                    "idType = '" . $Activity->Type_idType . "'"  
                ]
            );

         $this->view->type = $type;

    }

    
}
