<?php

// Appliquez la notion
// Question
// Modifiez le script d'affichage de la liste des jeux de la question précédente,
//  pour n'afficher les jeux que 5 par 5, selon un numéro de page passé en paramètre. 
//  Pour rappel, voici la structure de la table des jeux et une liste de jeux à insérer, 
//  qui doivent être affichés sur deux pages :


// CREATE TABLE games(
//     id INTEGER(11) PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(50),
//     description TEXT
// );
// INSERT INTO games(name, description) VALUES 
// ('Super Moria World', 'Parcourez le monde pour jeter une tortue dans la lave !'),
// ('Super Moria World 2 : les deux Boos', 'Une nouvelle aventure vous attend.'),
// ('Super Moria World 3 : Le retour du Koopa', 'Le dernier volet de la trilogie.'),
// ('The legend of Zebda', 'Une épopée musicale où vous devez vaincre les forces du mal.'),
// ('The legend of Zebda : Gojira''s Mask', 'Empêchez le ciel de vous tomber sur la tête !'),
// ('The legend of Zebda : Queen''s awakening', 'Le spectacle doit continuer');

// Indice
// Il est critique, ici, de bien spécifier le type dans le bindValue.




class Game
{
    private int $id;
    private string $name;
    private string $description;

  public function getFullGameDescription(){
   return  $this->name.' - '.$this->description.'<br>';
  }
}

?>