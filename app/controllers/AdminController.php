<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AdminController extends \Phalcon\Mvc\Controller
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


    public function newSTDAction()
    {

    }

     public function searchSTDAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Student', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idStudent";

        $student = Student::find($parameters);
        if (count($student) == 0) {
            $this->flash->notice("The search did not find any student");

            $this->dispatcher->forward([
                "controller" => "admin",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $student,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }


    public function editSTDAction($idStudent)
    {
        if (!$this->request->isPost()) {

            $student = Student::findFirstByidStudent($idStudent);
            if (!$student) {
                $this->flash->error("student was not found");

                $this->dispatcher->forward([
                    'controller' => "admin",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idStudent = $student->idStudent;

            $this->tag->setDefault("idStudent", $student->idStudent);
            $this->tag->setDefault("NameTitle", $student->NameTitle);
            $this->tag->setDefault("FirstName", $student->FirstName);
            $this->tag->setDefault("LastName", $student->LastName);
            $this->tag->setDefault("Year", $student->Year);

            
        }
    }

    /**
     * Creates a new student
     */
    public function createSTDAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'newSTD'
            ]);

            return;
        }

        $student = new Student();
        $student->idStudent = $this->request->getPost("idStudent");
        $student->NameTitle = $this->request->getPost("NameTitle");
        $student->username = $this->request->getPost("username");
        $student->password = $this->request->getPost("password");
        $student->FirstName = $this->request->getPost("FirstName");
        $student->LastName = $this->request->getPost("LastName");
        $student->Year = $this->request->getPost("Year");
        $student->active = 1;
    
        

        if (!$student->save()) {
            foreach ($student->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'newSTD'
            ]);

            return;
        }

        $this->flash->success("student was created successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'newSTD'
        ]);
    }

    /**
     * Saves a student edited
     *
     */
    public function saveSTDAction()
    {
        $id = $this->request->getPost("id");
        $students = Student::findFirst($id);

     
        if ($students->save($_POST)){
           $this->flashSession->success("Update successfully!");
            return $this->response->redirect("admin/searchSTD");
        }
    }

    public function deleteSTDAction($idStudent)
    {
        $student = Student::findFirst($idStudent);
        if (!$student) {
            $this->flash->error("teacher was not found");

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'index'
            ]);

            return;
        }
        $student->active = 0;
        $student->save();
        

        $this->flash->success("student was deleted successfully");

        return $this->response->redirect("admin/searchSTD");
    }

   

    // ----------------------teacher---------------------------------------------------
    // ----------------------teacher---------------------------------------------------
    // ----------------------teacher---------------------------------------------------
    // ----------------------teacher---------------------------------------------------


    public function newTeacherAction()
    {

    }
     public function searchTeacherAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Teacher', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idTeacher";

        $teacher = Teacher::find($parameters);
        if (count($teacher) == 0) {
            $this->flash->notice("The search did not find any teacher");

            $this->dispatcher->forward([
                "controller" => "admin",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $teacher,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */

   
 
    public function editTeacherAction($idTeacher)
    {
        if (!$this->request->isPost()) {

            $teacher = Teacher::findFirstByidTeacher($idTeacher);
            if (!$teacher) {
                $this->flash->error("teacher was not found");

                $this->dispatcher->forward([
                    'controller' => "admin",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idTeacher = $teacher->idTeacher;

            $this->tag->setDefault("id", $teacher->idTeacher);
            $this->tag->setDefault("NameTitle", $teacher->NameTitle);
            $this->tag->setDefault("username", $teacher->username);
            $this->tag->setDefault("password", $teacher->password);
            $this->tag->setDefault("FirstName", $teacher->FirstName);
            $this->tag->setDefault("LastName", $teacher->LastName);
            $this->tag->setDefault("admin", $teacher->admin);
            
        }
    }

    /**
     * Creates a new teacher
     */
    public function createTeacherAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
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
        $teacher->Phone = $this->request->getPost("Phone");
        $teacher->Mail = $this->request->getPost("Mail");
        $teacher->admin = $this->request->getPost("admin");
        

        if (!$teacher->save()) {
            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'newTeacher'
            ]);

            return;
        }

        $this->flash->success("teacher was created successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a teacher edited
     *
     */
    public function saveTeacherAction()
    {
        $id = $this->request->getPost("id");
        $teachers = Teacher::findFirst($id);

     
        if ($teachers->save($_POST)){
           $this->flashSession->success("Update successfully!");
            return $this->response->redirect("admin/searchTeacher");
        }
    }


  
    public function deleteTeacherAction($idTeacher)
    {
        $teacher = Teacher::findFirstByidTeacher($idTeacher);
        if (!$teacher) {
            $this->flash->error("teacher was not found");

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'index'
            ]);

            return;
        }

       $teacher->active=0;
       $teacher->save();

        $this->flash->success("teacher was deleted successfully");

        return $this->response->redirect("admin/searchTeacher");
    }

    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    //------------------------------------------------------ACTIVITY----------------------------------------------------------
    public function newActivityAction()
    {
        
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
            return $this->response->redirect("admin/searchActivity");
        }
    }

    public function createActivityAction()
    {
         if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "activity",
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
        $activity->Locaion_idLocaion = $this->request->getPost("Locaion_idLocaion");
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
                'controller' => "activity",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("activity was created successfully");

        $this->dispatcher->forward([
            'controller' => "activity",
            'action' => 'index'
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
    public function saveAcAction()
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


    public function saveHistoryAction($idActivity)
    { 
        
        $activitys = Activity::findFirst($idActivity);
        $this->view->activity =  $activitys;

       
        $dataSTD = Detailactivity::find([
                        "idActivity = '" . $idActivity . "'"  
                    ]);
        $i=0;

        foreach ($dataSTD as $key => $value) {
          $students[$i] = Student::findFirst($value->idStudent);
          $i++;
        }

        if($i==0){
            $this->view->data = 0;
            return;
        }else{
            $this->view->students =  $students;
            $this->view->data = 1;
        }

    }

    public function insertAction()
    { 
        $id = $this->request->getPost("idstd");
        $students = Student::findFirst(
            [
                "idStudent = '" . $id . "'"  
            ]
        );
        if(!$students){
            $this->flashSession->error("รหัสนักศึกษาไม่ถูกต้อง");
            return $this->response->redirect("admin/saveAc");
        }else{
            $detail = Detailactivity::findFirst(
                [
                    "idStudent = '" . $id . "'"  
                ]
            );
            if($detail){
                $this->flashSession->error("ข้อมูลซ้ำ");
                return $this->response->redirect("admin/saveAc");
            }else{
                $user = new detailactivity;
                
            }
        }
    }

    public function saveHisAction()
    { 
            $hidden = $this->request->getPost("hidden");

            $idActivity = $this->request->getPost('idActivity');
            for($i=1;$i<=$hidden;$i++){
                // $tel[$i] = $this->request->getPost('tel'.$i);

                 $detailactivity = new Detailactivity();
                 $detailactivity->idStudent = $this->request->getPost('tel'.$i);
                 $detailactivity->idActivity = $idActivity;
               
                 $detailactivity->save();

            }

            $url = "saveHistory/".$idActivity;
           return $this->response->redirect("admin/".$url);
   
    }
}

