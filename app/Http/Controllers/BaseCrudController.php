<?php
namespace App\Http\Controllers;

abstract class BaseCrudController extends Controller{
    protected $model;

    public function index(){
        return $this->model->paginate();
    }

    public function store (){
        return $this->model->create($this->inputStore());
    }

    abstract protected function inputStore();
}
