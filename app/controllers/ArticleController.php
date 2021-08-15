<?php

namespace Controllers;

use System\Controller;
use System\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = DB::all($this->model->table);

        $this->view->render('article', 'layout', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        $this->view->render('article-create', 'layout');
    }

    public function store()
    {
        DB::create($this->model->table, $_POST);

        redirect('/article');
    }

    public function delete()
    {
        DB::delete($this->model->table, $_POST['id']);
    }

    public function edit()
    {
        $data = DB::find($this->model->table, $_POST['id']);

        $this->view->render('article-edit', 'layout', [
            'data' => $data,
        ]);
    }

    public function update()
    {
        DB::update($this->model->table, $_POST);

        redirect('/article');
    }

    public function reset()
    {
        DB::truncate($this->model->table);

        redirect('/article');
    }
}