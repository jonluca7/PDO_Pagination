# Exercice Application cours PDO Pagination
Le libéllé de l'exercice est contenu dans la page 'Game.php'.

# Corrigé du cours

<?php <br><br>
// Game.php <br><br>
class Game <br>
{
    private int $id; <br>
    private string $name; <br>
    private string $description; <br>
    public function getFullDescription() <br>
    {
        return $this->name.' - '.$this->description; <br>
    }<br>
}<br><br>
// index.php <br><br>
try { <br>
    require_once 'Game.php'; <br>
    $pdo = new PDO('mysql:host=localhost;dbname=intro_pdo', 'root', ''); <br>
    $statement = $pdo->prepare('SELECT * FROM games LIMIT :start, 5'); <br>
    $statement->bindValue('start', 5 * ($_GET['page'] - 1), PDO::PARAM_INT); <br>
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Game'); <br>
    if ($statement->execute()) { <br>
        while ($user = $statement->fetch()) { <br>
            echo $user->getFullDescription(); <br>
        } <br>
    } else { <br>
        $errorInfo = $statement->errorInfo(); <br>
        echo $errorInfo[2]; <br>
    } <br>
} catch (PDOException $e) { <br>
    echo 'Une erreur s\'est produite lors de la communication avec la base'; <br>
}



