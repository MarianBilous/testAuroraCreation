<?php

namespace System;

class Controller
{
    protected $view;
    protected $model;

    public function __construct($model)
    {
        $this->view = new View();
        $this->model = $model;
    }

    public function index() {}
    public function create() {}
    public function store() {}
    public function edit() {}
    public function update() {}
    public function delete() {}
}