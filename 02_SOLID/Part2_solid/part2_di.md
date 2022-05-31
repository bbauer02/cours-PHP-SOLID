# DI 

Dependancy Injection, rappelons le principe :

- Dependency injection
*Les objets ne doivent pas créer eux-mêmes les objets dont ils dépendent, on doit les injecter (on crée les instances à l'extérieur de la classe, puis on les "injecte". On ne fait pas de new dans une classe).* 

Techniquement nous pourrions préparer dans le script courant les instances dont nos classes ont besoin, puis appliquer ce principe et injecter nos dépendances classiquement.

Cependant, il est plus intéressant de passer par un Container Services. En effet ce dernier, plus qu'une simple "Factory", vous permettra de préparer ces instances en les configurant pour votre application.

Pour découvrir ce principe d'inversion de contrôle nous allons chercher les dépendances seulement lorsque nous en avons besoin. (Principe d'Hollywood).

## 01 Exercice DI

En fonction du code suivant essayez d'implémenter un DI (Dependancy Injection)

```php
class Container implements \ArrayAccess
{

    /**
     * @p Storage 
     */
    protected $p;

    /**
     * @param mixed $k
     * @param mixed $v
     */
    public function offsetSet($k, $v)
    {
       
    }

    /**
     * @param mixed $k
     * @return mixed
     */
    public function offsetGet($k)
    {

     
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
```