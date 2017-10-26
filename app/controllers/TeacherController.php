<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class TeacherController extends ControllerBase
{
    /**
     * Index action
     */
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
    public function searchAction()
    {
    //if ($this->session->has("login")) {
      $numberPage = $this->request->getQuery("page", "int");

      $parameters["order"] = "idActivity DESC";
      $activity = activity::find($parameters);
      $paginator = new Paginator([
        'data' => $activity,
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
     * Edits a teacher
     *
     * @param string $idTeacher
     */
    public function editAction($idTeacher)
    {
        if (!$this->request->isPost()) {

            $teacher = Teacher::findFirstByidTeacher($idTeacher);
            if (!$teacher) {
                $this->flash->error("teacher was not found");

                $this->dispatcher->forward([
                    'controller' => "teacher",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idTeacher = $teacher->idTeacher;

            $this->tag->setDefault("idTeacher", $teacher->idTeacher);
            $this->tag->setDefault("NameTitle", $teacher->NameTitle);
            $this->tag->setDefault("username", $teacher->username);
            $this->tag->setDefault("password", $teacher->password);
            $this->tag->setDefault("FirstName", $teacher->FirstName);
            $this->tag->setDefault("LastName", $teacher->LastName);
            $this->tag->setDefault("Picture", $teacher->Picture);
            $this->tag->setDefault("Phone", $teacher->Phone);
            $this->tag->setDefault("Mail", $teacher->Mail);
            $this->tag->setDefault("admin", $teacher->admin);
            
        }
    }

    /**
     * Creates a new teacher
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'index'
            ]);

            return;
        }

        $teacher = new Teacher();
        $teacher->NameTitle = $this->request->getPost("NameTitle");
        $teacher->username = $this->request->getPost("username");
        $teacher->password = $this->request->getPost("password");
        $teacher->FirstName = $this->request->getPost("FirstName");
        $teacher->LastName = $this->request->getPost("LastName");
        $teacher->Picture = $this->request->getPost("Picture");
        $teacher->Phone = $this->request->getPost("Phone");
        $teacher->Mail = $this->request->getPost("Mail");
        $teacher->admin = $this->request->getPost("admin");
        

        if (!$teacher->save()) {
            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("teacher was created successfully");

        $this->dispatcher->forward([
            'controller' => "teacher",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a teacher edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'index'
            ]);

            return;
        }

        $idTeacher = $this->request->getPost("idTeacher");
        $teacher = Teacher::findFirstByidTeacher($idTeacher);

        if (!$teacher) {
            $this->flash->error("teacher does not exist " . $idTeacher);

            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'index'
            ]);

            return;
        }

        $teacher->NameTitle = $this->request->getPost("NameTitle");
        $teacher->username = $this->request->getPost("username");
        $teacher->password = $this->request->getPost("password");
        $teacher->FirstName = $this->request->getPost("FirstName");
        $teacher->LastName = $this->request->getPost("LastName");
        $teacher->Picture = $this->request->getPost("Picture");
        $teacher->Phone = $this->request->getPost("Phone");
        $teacher->Mail = $this->request->getPost("Mail");
        $teacher->admin = $this->request->getPost("admin");
        

        if (!$teacher->save()) {

            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'edit',
                'params' => [$teacher->idTeacher]
            ]);

            return;
        }

        $this->flash->success("teacher was updated successfully");

        $this->dispatcher->forward([
            'controller' => "teacher",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a teacher
     *
     * @param string $idTeacher
     */
    public function deleteAction($idTeacher)
    {
        $teacher = Teacher::findFirstByidTeacher($idTeacher);
        if (!$teacher) {
            $this->flash->error("teacher was not found");

            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'index'
            ]);

            return;
        }

        if (!$teacher->delete()) {

            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "teacher",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("teacher was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "teacher",
            'action' => "index"
        ]);
    }


    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    public function newActivityAction()
    {
        
    }

    public function createActivityAction()
    {
         if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "Teacher",
                'action' => 'index'
            ]);

            return;
        }

        $activity = new Activity();
        $activity->ActivityName = $this->request->getPost("ActivityName");
        $activity->Detail = $this->request->getPost("Detail");
        $activity->StartDate = $this->request->getPost("StartDate");
        $activity->EndDate = $this->request->getPost("EndDate");
        $activity->YearSTD = $this->request->getPost("YearSTD");
        $activity->Location_idLocation = $this->request->getPost("Location_idLocation");
        $activity->Teacher_idTeacher = $this->request->getPost("Teacher_idTeacher");
        $activity->Type_idType = $this->request->getPost("Type_idType");
        $activity->YearOfEducation_semeter = $this->request->getPost("YearOfEducation_semeter");
        $activity->YearOfEducation_Year = $this->request->getPost("YearOfEducation_Year");
        $activity->picture = $this->request->getPost("picture");
        

        if (!$activity->save()) {
            foreach ($activity->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "Teacher",
                'action' => 'newActivity'
            ]);

            return;
        }

        $this->flash->success("activity was created successfully");

        $this->dispatcher->forward([
            'controller' => "Teacher",
            'action' => 'newActivity'
        ]);
    }

    public function searchActivityAction()
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
     public function editActivityAction($idActivity)
    {
         if (!$this->request->isPost()) {

            $activity = Activity::findFirst($idActivity);
            if (!$activity) {
                $this->flash->error("activity was not found");

                $this->dispatcher->forward([
                    'controller' => "teacher",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idActivity = $activity->idActivity;

            $this->tag->setDefault("id", $activity->idActivity);
            $this->tag->setDefault("ActivityName", $activity->ActivityName);
            $this->tag->setDefault("Detail", $activity->Detail);
            $this->tag->setDefault("StartDate", $activity->StartDate);
            $this->tag->setDefault("EndDate", $activity->EndDate);
            $this->tag->setDefault("YearSTD", $activity->YearSTD);
            $this->tag->setDefault("Location_idLocation", $activity->Location_idLocation);
            $this->tag->setDefault("Teacher_idTeacher", $activity->Teacher_idTeacher);
            $this->tag->setDefault("Type_idType", $activity->Type_idType);
            $this->tag->setDefault("YearOfEducation_semeter", $activity->YearOfEducation_semeter);
            $this->tag->setDefault("YearOfEducation_Year", $activity->YearOfEducation_Year);
            $this->tag->setDefault("picture", $activity->picture);
            
        }
    }

     public function saveActivityAction()
    {
        $id = $this->request->getPost("id");
        $activity = Activity::findFirst($id);
/*
            $students->stdid = $this->request->getPost("stdid");
            $students->name = $this->request->getPost("name");
            $students->year = $this->request->getPost("year");

        $students->save();
        */
        if ($activity->save($_POST)){
           $this->flashSession->success("Update successfully!");
            return $this->response->redirect("Teacher/searchActivity");
        }
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
