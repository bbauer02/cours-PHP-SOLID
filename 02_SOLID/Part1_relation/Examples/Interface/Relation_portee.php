<?php

class Model{

    private $tableName;

    public function __construct($name)
    {
        $this->tableName = $name;
    }

    protected function getMemory(){
        return 1000;
    }
}


class Post {

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function info(){

        // Impossible car la visibilité de cette méthode est protected accessible unimquement dans la classe Model elle-même
       // return $this->model->getMemory();
    }
} 

$post = new Post(new Model("posts"));

echo $post->info();