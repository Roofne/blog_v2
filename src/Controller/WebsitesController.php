<?php

namespace App\Controller;

use App\Controller\AppController;

class WebsitesController extends AppController 
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        $this->Authentication->addUnauthenticatedActions(['login','addUser']);
        
    }

    public function index()
    {
        $this->get_articles();

        $this->loadModel('Users');
        $identity = $this->Authentication->getIdentity();
        $user = $identity->getOriginalData();
        $this->set(compact('user'));
    }

    public function login()
    {
        $this->get_articles();

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) 
        {
            $this->Flash->success("Connection réusie");
            $target = $this->Authentication->getLoginRedirect() ?? ['prefix' => false, 'controller' => 'Websites', 'action' => 'index'];
            return $this->redirect($target);

        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Websites', 'action' => 'login']);
        }
    }

    public function addArticle()
    {
        $this->get_user();

        $this->loadModel('Articles');
        $article = $this->Articles->newEmptyEntity();

        if($this->request->is('post')) {

            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->user_id = 1;
            echo $article;


            if($this->Articles->save($article))
            {
                $this->Flash->success('Your article has been saved');
                return $this->redirect(['controller' => 'Websites', 'action' => 'index']);
            }
            $this->Flash->error('Unable to add article');
        }

        $this->set(compact('article'));
    }

    
    public function addUser()
    {
        $this->loadModel('Users');
        $user = $this->Users->newEmptyEntity();

        if($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user))
            {
                $this->Flash->success('Your user has been added');
                return $this->redirect(['controller' => 'Websites', 'action' => 'index']);
            }
            $this->Flash->error('Unable to add user');
        }

        $this->set(compact('user'));
    }

    public function editArticle($slug)
    {
        $this->get_user();

        $this->loadModel('Articles');
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        if($this->request->is(['post','put']))
        {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if($this->Articles->save($article))
            {
                $this->Flash->success('Your article has been updated');
                return $this->redirect(['controller' => 'Websites', 'action' => 'index']);
            }
            $this->Flash->error('Unable to edit article');

        }

        $this->set(compact('article'));
    }

    public function editUser($slug = null)
    {
        $this->loadModel('Users');
        $identity = $this->Authentication->getIdentity();
        $user = $identity->getOriginalData();
        $this->set(compact('user'));

        if($this->request->is(['post','put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user))
            {
                $this->Flash->success('Your account has been updated');
                return $this->redirect(['controller' => 'Websites', 'action' => 'index']);
            }
            $this->Flash->error('Unable to edit account');

        }

        $this->set(compact('user'));
    }
    public function viewArticle($slug = null)
    {    
        $this->get_user();
    
        $this->loadModel('Articles');
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function get_articles()
    {
        $this->loadModel('Articles');
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }

    public function get_user()
    {        
        $this->loadModel('Users');
        $identity = $this->Authentication->getIdentity();
        $user = $identity->getOriginalData();
        $this->set(compact('user'));
    }

    public function deleteArticle($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $this->loadModel('Articles');
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        if($this->Articles->delete($article))
        {
            $this->Flash->success(__('The article {0} has been deleted', $article->title));
            return $this->redirect(['controller' => 'Websites', 'action' => 'index']);
        }
        $this->Flash->error('Unable to delete article');
    }
}

?>