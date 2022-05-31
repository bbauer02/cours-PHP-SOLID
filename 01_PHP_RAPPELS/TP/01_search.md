# Problème recherche une séquence 

Dans la suite vous pouvez utiliser les techniques ou fonctions de PHP que vous connaissez.

Vous travaillerez sur des tableaux de nombres entiers pour rechercher un mot dans le texte.

```php
$content = [2,1,4,2, 6, 1, 2, 3, 7];
$seq = [1,2,3]; // mot recherche
```

1. Créez une fonction **search_pos_word** qui recherche la position de la première occurence d'une chaîne de caractères dans un texte.

```php
search_pos_word(content : $content, seq : $seq);
```

2. Créez maintenant une fonction **search_pos_seq_all** qui trouve toutes les premières occurences des mots recherchés dans un texte. Utilisez la fonction que vous avez implémentée dans le 1. La fonction retournera un objet de type Search possédant les arguments suivants :

```php
class Search
{
    public function __construct(
        public string $seq,
        public array $pos = []
    ) {
    }
}
```
