<?php
use App\Http\Controllers\Controller;

abstract class BaseCrudController extends Controller{
    protected $model;
    protected $view;

    public function index(){
        return $this->model->paginate();
    }

    public function store (){
        return $this->model->create($this->inputStore());
    }

    abstract protected function inputStore();
}
