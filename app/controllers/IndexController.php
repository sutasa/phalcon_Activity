<?php
use Phalcon\Paginator\Adapter\Model as Paginator;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	return $this->response->redirect("home/index");
	}
  

}

