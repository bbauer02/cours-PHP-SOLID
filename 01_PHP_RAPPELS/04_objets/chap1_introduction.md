# Objet

L'objet existe depuis la version 3 de PHP, à ce moment on n'a pas vraiment un langage de programmation objet.Ce n'est qu'à partir de la version 5 que PHP introduit les véritables concepts de l'objet.Bien que PHP soit un langage de script on va programmer tout en objet dans la suite de ce cours.

## Introduction à l'objet

### Définitions

- Def Classe 

Une classe est la somme des propriétés et attributs d'un objet. 
C'est une représentation abstraite d'un objet.

- Objet 

Un objet est une instance d'une classe.

- Def Attributs et méthodes d'une classe 

Les attributs d'une classe sont les variables d'une classe et les méthodes sont les fonctions de la classe. Plus généralement on appelle membre d'une classe les attributs ou méthodes d'une classe.
Exemples Ci-dessous une représentation abstraite d'un personnage, la classe "Persona" n'est pas, par définition, concrète. 
La classe représente l'implémentation des attributs (variables de la classe) et méthodes (fonctions de la classe), le code que l'on écrit dans la classe. 

Pour rendre "concrète" son utilisation, on fera une instance de la classe Persona.

```php
class Persona{

    public function __construct(
        private $force, 
        private $secret = "my secret"
    ){}

    public function fight(){
        echo "missile";
    }
}
``` 

Un objet est une instance de classe, c'est une variable dans le script courant.

## Visibilité d'un attribut ou d'une méthode

Si un membre de la classe est privé il est impossible d'y accéder à l'extérieur de la classe, c'est-à-dire à partir de l'objet dans le script courant.

<img src="../images/visibility.png"
     alt="visibility"
     style="margin-right: 10px;" width="500" />

### Méta-variable $this

Pour qu'une méthode puisse manipuler une variable de classe à l'intérieur de la classe elle-même, elle utilise la méta-variable :

```php
$this;
```

C'est une référence à une instance unique de la classe dans le script.

### Principe d'encapsulation

Si un attribut ou une méthode est privé il est donc impossible d'y accéder dans le script courant. 

Plus généralement les attributs seront privés et les méthodes publiques.

- Définition 

Les données (attributs) ne peuvent être modifiées dans le script courant directement (ils sont privés), seuls les méthodes qui contrôles les données peuvent le faire. 

Une boîte noire dans un avion par exemple aura un programme possédant des attributs privés et des méthodes publiques; pour modifier les attributs privés, si un événement exceptionnel dans l'avion se produit, seuls les méthodes publiques peuvent le faire.

- Accéder aux attributs: accesseur ou getter

- mutateur ou setter

- accesseur ou getter

## Single Responsability

Lorsqu'on programmera en objet on devra toujours garder à l'esprit le principe suivant: Une classe un rôle, ou attribuer à chaque classe une responsabilité unique définie et bornée. Par exemple la classe Persona, Scene, Role.

Il faudra également respecter le principe suivant, une classe un fichier, c'est comme cela que l'on programme en objet pas autrement.

## Exercice Calculator

Créez une classe Calculator. Cette classe implémentera les spécificités suivantes :

- addition signature : prend deux arguments numériques et retourne un flottant

- multiplication signature : prend deux arguments numériques et retourne un flottant

- division signature : prend deux arguments numériques et retourne un flottant

- somme signature : prend N un entier supérieur à 2 arguments numériques et retourne un flottant

## Exercice Calculator une autre version

Implémentez maintenant une calculatrice qui prend une expression et calcul celle-ci. L'expression ou une opération sera passée sous forme d'un tableau de tableau comme suit :

```php
$calculator = new Calculator;

$operation = [ [11, 2], ["+"] ] ;

$calculator->result($operation);
```

### Principe de l’héritage

Pour faire de l’héritage vous devez appliquer le principe suivant :une classe étendue doit être une sorte de ou est un.

Ainsi, par exemple si vous avez une classe Book qui est étendue de la classeProduct, vous faites bien de l’héritage, car un livre est un produit ou une sorte de produit.

Si vous n’appliquez pas ce principe vous ne faites pas d’héritage au sens strict du paradigme objet. Voici comment vous devez représenter cette relation en diagramme UML :

<img src="../images/heritage.png"
     alt="heritage"
     style="margin-right: 10px;" width="300" />

## traits

C'est une méthode pour réutiliser du code en PHP dans le contexte de l'héritage simple. Une classe peut utiliser plusieurs traits (mixins).

Un trait sert à regrouper des fonctionnalités intéressantes, il ne peut pas être instancié. Il s'ajoute à la notion d'héritage qui autorise la composition horizontale des comportements, ou plus exactement l'utilisation de méthodes sans héritage.

```php
trait showHello {
    public function hello() { echo "Hello " ; }
}

trait showWorld {
    public function world() { echo " World " ; }
}

class View{
    use showHello, showWorld;

    public function exclamation(){
        echo " !";
    }
}

$o = new View();
$o->hello();
$o->world();
$o->exclamation();
// Hello World !
```

### Résolution de conflits

Si deux traits importent deux fonctions identiques dans une classe une exception est levée. 
Pour résoudre ce conflit entre traits, il faut utiliser l'opérateur **insteadof**.

```php
trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

// résolution de conflit
class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}
``` 

### Changer la visibilité des méthodes 

En utilisant la syntaxe **as**, vous pouvez aussi ajuster la visibilité des méthodes d'un trait dans une classe. Les méthodes privées ne peuvent être modifiées.

```php 
trait HelloWorld {
    protected function sayHello() {
        echo 'Hello World!';
    }
}

// Modification de la visibilité de la méthode sayHello protected => public possible
class A {
    use HelloWorld { sayHello as public; }
}

$b = new A;

echo $b->sayHello();
```

## Interface (rappel)

Les interfaces objets vous permettent de définir des méthodes publiques que vos classes devront implémenter(programmation par contrat).

```php
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}
class Template implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}
```

## TP Yam 

Vous allez créer un petit composant qui permet de lancer 5 dés pour jouer au Yam. Il n'y aura qu'un seul joueur dans l'application et nous ne testeront que le lancer de 5 dés (en même temps). Nous allons faire des statistiques sur les différentes combinaisons du jeu. Vous ne retiendrez que certaines combinaisons de Yam.

Pour compter le nombre de combinaisons vous lancerez plusieurs fois les 5 dés. Par exemple sur 50 tests qui lancent 1 fois 5 dés en même temps on pourrait avoir :

- Brelan : 2 (trois dés identiques)

- Carré : 1 (4 dés indentiques)

- Double paire : 4 (deux dés identiques X 2 les paires sont des dés différents )

- Yam : 2 (5 dés identiques)

Créez autant de classe(s) que nécessaire pour implémenter ce composant.

## TP Queue

Implémentez une **queue** en définissant une classe. Voici comment dans le script courant vous devez appeler votre code pour ajouter un élément dans la **queue** et récupérer son premier élément.

FIFO (First In First Out)

```php
$queue = new Queue();
$queue->push(1);
$queue->push(2);
$queue->push(3);
$queue->pop(); // affiche 1
$queue->clear(); // retire tous les éléments de la queue
```

Facultatif. Vous pouvez utilliser l'interface ArrayAccess de cette classe métier.

```php
class Obj implements ArrayAccess {

    public function __construct(
        private array $container = [
             "un"    => 1,
            "deux"  => 2,
            "trois" => 3,
        ]
    ) {}

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

$obj = new Obj;

var_dump($obj["deux"] ?? 'no exist'); // méthode offsetExists dans la classe
unset($obj["deux"]); // supprime l'élément  // méthode offsetUnset exécutée
var_dump(?? $obj["deux"] 'no exist');
$obj["deux"] = "Une valeur";
var_dump($obj["deux"]);
$obj[] = 'Ajout 1';
$obj[] = 'Ajout 2';
$obj[] = 'Ajout 3';
print_r($obj);
```

## TP Exercice Button & Lamp

Imaginez une lampe dans votre salon. Décomposez celle-ci en deux entités : un **Button** et une **Lamp**. Vous ferez également un schéma sur papier pour vous représenter les relations entre ces deux entités.

```php
$lamp= new Button(new Lamp);
```

Puis implémentez le déclenchement de la lampe (allumée/éteinte).

```php
echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off
echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off
```

## TP exercices Letter & Console

Créez deux classes **Letter** et **Console**. La première classe génère les lettres de l'alphabet et la deuxième affiche le contenu d'un tableau de dimension 1 dans le terminal.

La méthode **generate** de la classe **Letter** génère 10 lettres aléatoirement de l'alphabet et retourne ces lettres dans un tableau. La show affiche en console le résultat.

```php
$letter = new Letter();
$console = new Console();

$alphabet = $letter->generate(10);

$console->show($alphabet);
```
