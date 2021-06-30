<?php

namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController{
    public function index()
    {
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }

    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();

        if($this->request->is('post')) {

            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->user_id = 1;
            echo $article;


            if($this->Articles->save($article))
            {
                $this->Flash->success('Your article has been saved');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('Unable to add article');
        }

        $this->set(compact('article'));
    }

    public function edit($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        if($this->request->is(['post','put']))
        {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if($this->Articles->save($article))
            {
                $this->Flash->success('Your article has been updated');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('Unable to edit article');

        }

        $this->set(compact('article'));
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        if($this->Articles->delete($article))
        {
            $this->Flash->success(__('The article {0} has been deleted', $article->title));
            return $this->redirect(['action'=>'index']);
        }
        $this->Flash->error('Unable to delete article');
    }
}
?>