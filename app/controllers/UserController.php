<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function checkLoginAction()
    {

        $password = $this->request->getPost("password");
        $username = $this->request->getPost("login");   
       

        $teacher = teacher::findFirst(
            [
                "username = '" . $username . "'"  
            ]
        );


        if($teacher){
                $username  = "อาจารย์ ".$teacher->FirstName." ".$teacher->LastName; 
                $status = $teacher->admin;
            if($password == $teacher->password){
                if($status == 0){
                    $this->session->set("username",$username);
                    $this->session->set("status",0);
                    return $this->response->redirect("admin/index");
                }
                else{
                    $this->session->set("username",$username);
                    $this->session->set("status",1);
                    return $this->response->redirect("admin/index");
                }
            }else{
                $this->flashSession->error("การล็อกอินของคุณไม่ถูกต้อง กรุณาตรวจสอบ ชื่อผู้ใช้ หรือ รหัสผ่าน " . $login . "และทำการล็อคอินใหม่อีกครั้ง");
                return $this->response->redirect("Home/index");

            } 
        }else{
            $this->flashSession->error("การล็อกอินของคุณไม่ถูกต้อง กรุณาตรวจสอบ ชื่อผู้ใช้ หรือ รหัสผ่าน " . $login . "และทำการล็อคอินใหม่อีกครั้ง");
                return $this->response->redirect("Home/index");

            }
        }
        

    public function logoutAction()
    {
        $this->session->destroy();

        $this->flashSession->success("Logout Successfully");
        return $this->response->redirect("home/index");
    }

}

