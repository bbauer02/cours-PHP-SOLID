# Redux en PHP

Vous allez mettre en place le design pattern Redux. Vous utiliserez la syntaxe PHP 8 pour l'implémentation du code.

Créez l'incrémentation et la décrémentation d'un counter.

```php
// source de vérité
$initialState = [
    'count' => 0
];
```

Et le nom de vos actions :

```php

const INCREMENT = "INCREMENT";
const DECREMENT = "DECREMENT";
```

Vous testerez alors son fonctionnement comme suit :

```php

$store = new Store( reducer : $reducer, state : $initialState);

$store->subscribe(function($state) {
    echo $state['count'] . PHP_EOL ;
});

$store->dispatch(new Action(type : "INCREMENT", action : ['number' => 1] )); // 1
$store->dispatch(new Action(type : "INCREMENT", action : ['number' => 1] )); // 2
$store->dispatch(new Action(type : "DECREMENT", action : ['number' => 1] )); // 1
$store->dispatch(new Action(type : "INCREMENT", action : ['number' => 1] )); // 2
$store->dispatch(new Action(type : "INCREMENT", action : ['number' => 1] )); // 3
$store->dispatch(new Action(type : "INCREMENT", action : ['number' => 1] )); // 4
$store->dispatch(new Action(type : "INCREMENT", action : ['number' => 1] )); // 5

```

## Design pattern Flux

*Le Flux est un design pattern qui détermine un ordre de gestion des données. Il impose un ordre dans lequel la mise à jour des données doit s'effectuer. Le flux met de la prévisibilité via ce que l'on appelle un data flow strictement unidirectionnel. Pour ceux qui connaissent React cela permet de rendre l'application prévisible en fonction du flux des données qui hydratent l'application.*

Redux a été créé en partant de ce pattern. Il possède trois concepts appliqués à l'application :

- State global 

- Des actions

- Un reducer

Détaillons le pattern du Flux simplement.

Un **state** global est une description de l'état des données de l'application de manière globale. Normalement sous forme d'un objet. Ce global **state** sera pris en charge par le **store**.

Le global **state** doit rester dans l'état dans lequel il a été défini. Le même "arbre structurel" avec les mêmes valeurs. Cela permet la relecture des données d'une application d'un point A vers un point B. On peut remonter l'historique des changements en retrouvant l'arbre d'origine ou structure et valeurs initiales.

Les actions modifieront l'état de l'application. En théorie ce sont les **actions creators** qui sont utilisées et qui retournent une action spécifique avec des paramètres éventuels. 

Le reducer reliera les **states** ou états du **state** global aux actions. Dans le flux le reducer doit toujours retourner la même structure du global **state** en fonction d'un type d'action utilisée par le reducer. On utilise pour cela la notion de fonction pure qui pour les mêmes arguments retourne toujours la/les même(s) valeur(s) sans effet de bord.

Le **state** retourné par le reducer est dans l'application en lecture seule.

Notez que les reducers sont des fonctions pures.

Voici pour vous aidez la version JS de Redux. Vous implémenterez le même pattern en PHP.

```html
<!DOCTYPE html>
<html>
  <head>
    <title>Redux basic example</title>
    <script src="https://unpkg.com/redux@latest/dist/redux.min.js"></script>
  </head>
  <body>
    <div id="root"></div>
    <script>

      // la source de véritié ou structure de l'arbre d'origine de votre application
      let stateInit = {
        messages : []
      };

      // Algorithmique qui va modifier sur une copie le stateInit 
      const messageReducer = (state = stateInit, action)  =>{
        console.log('source de veritie', stateInit)
        switch (action.type) {

          case 'ADD_MESSAGE':

             let messages = [...state.messages, action.message];

            // on crée un nouvel état => nouvel objet
            // return Object.assign({}, state, {messages : messages });

            return { ...state, messages : messages }
      
          default:
            return state
        }
      }

      // Définition du store
      let store = Redux.createStore(messageReducer);

      // subscribe au state global pour voir les changements
      let unsubscribe = store.subscribe(() => {
        // lecture du state 
        console.log('new state subscribe', store.getState()); // on écoute les changements
      });

      // lecture du state faite qu'une fois au chargement de la page
      console.log('new state', store.getState());

      // dispatch les données dans le store global
      store.dispatch({type : 'ADD_MESSAGE', message : "Hello world 1 !"});
      store.dispatch({type : 'ADD_MESSAGE', message : "Hello world 2 !"});
      store.dispatch({type : 'ADD_MESSAGE', message : "Hello world 3 !"});
      store.dispatch({type : 'ADD_MESSAGE', message : "Hello world 4 !"});
      store.dispatch({type : 'ADD_MESSAGE', message : "Hello world 5 !"});

      unsubscribe();
      
      store.dispatch({type : 'ADD_MESSAGE', message : "Hello world 6 !"});
    </script>
  </body>
</html>


```