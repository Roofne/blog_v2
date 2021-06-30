<?php

namespace App\Controller;

use App\Controller\AppController;

class WebsitesController extends AppController 
{
    public function index()
    {
        $this->get_articles();

        $this->loadModel('Users');
        //$identity = $this->Authentication->getIdentity();
        //$user = $identity->getOriginalData();
        $this->set(compact('user'));
    }

    public function login()
    {

    }

    public function addArticle()
    {

    }

    
    public function addUser()
    {

    }

    public function editArticle()
    {

    }

    public function editUser()
    {

    } 

    public function get_articles()
    {
        $this->loadModel('Articles');
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }
}

?>