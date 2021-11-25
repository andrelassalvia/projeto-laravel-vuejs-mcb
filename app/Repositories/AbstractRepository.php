<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository{
  public function __construct(Model $model){
    $this->model = $model;
    
  }

  // Index
  public function selectAttribRelacionados($attribs){
    $this->model = $this->model->with($attribs);

  }

  // Index
  public function filtro($ftro){
    $filtro = explode(';',$ftro);
    foreach ($filtro as $value) {
      $condicoes = explode(':', $value);
      $this->model = $this->model->where($condicoes[0], $condicoes[1], $condicoes[2]);
    }
  }

  // Index
  public function selectAttribs($atr){
    $this->model = $this->model->selectRaw($atr);
  }

  // Index
  public function charge($sort){
    $this->model = $this->model->get()->sortBydesc($sort);
  }
}
