<?php

class Container implements ArrayAccess
{

    /**
     * @p Storage 
     */
    protected $storage= [];

    /**
     * @param mixed $k
     * @param mixed $v
     */
    public function offsetSet($k, $v)
    {
      if(isset($this->storage[$k])) throw new Error("Le serviceexiste déjà !!!");

      $this->storage[$k] = $v;
    }

    /**
     * @param mixed $k
     * @return mixed
     */
    public function offsetGet($k)
    {

        if(!isset($this->storage[$k])) throw new Error("Le service n'existe pasv !!!");

        if(is_callable($this->storage[$k])){

            return $this->storage[$k]($this);
        }

       return $this->storage[$k]; // 123
    }

    /**
     * @param mixed $id
     * @return bool
     */
    public function offsetExists($id)
    {
        
    }
    /**
     * @param mixed $id
     */
    public function offsetUnset($id)
    {
      
    }
}

$container = new Container;

interface IMailer{
    function get():string;
}

class Mailer implements IMailer{

    public function __construct(private string $apiKey)
    {}

    public function get():string{
        return $this->apiKey;
    }
}

// ce n'est pas une fonction anonyme
$container['mailer-config'] = '123';

// callable <=> fonction anonyme
$container['mailer'] = function($c){

    return new Mailer($c['mailer-config']);
};

class Controller{

    public function index(IMailer $mailer){

        var_dump($mailer);
    }
}

$controller = new Controller;

$controller->index($container['mailer']);