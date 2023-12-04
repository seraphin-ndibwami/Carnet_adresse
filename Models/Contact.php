<?php
require_once('Connexion.php');

class Contacts {
    private $photo;
    private $nom;
    private $adresse;
    private $telephone;
    private $email;
    private $description;
   

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct($photo, $nom, $adresse, $telephone, $email, $description) {
        $this->photo = $photo;
        $this->nom = $nom;  
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->description = $description;
    }

    public function enregistrerBDD() {
        
        global $connexion;
        
        try {
            
            $sql = "INSERT INTO Contacts (photo, nom, adresse, telephone, email, descriptions)
                    VALUES (:photo, :nom, :adresse, :telephone, :email, :descriptions)";
            $stmt = $connexion->prepare($sql);

            // Liaison des paramètres
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':adresse', $this->adresse);
            $stmt->bindParam(':telephone', $this->telephone);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':descriptions', $this->description);

            // Exécution de la requête préparée
            $stmt->execute();

            return "succes";
            
        } catch(PDOException $e) {
            
            return $e->getMessage();
        }
    }

    // Méthodes getter
    public function getPhoto() {
        return $this->photo;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDescription() {
        return $this->description;
    }

    public static function recupererTousLesContacts() {
        global $connexion;

        try {

            $stmt = $connexion->prepare("SELECT * FROM contacts");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $tableauxContacts = [];

            if($result) {
                foreach($result as $row) {
                    $tableauxContacts[$row["id"]]= new Contacts($row["photo"],$row["nom"],$row["adresse"],$row["telephone"],$row["email"],$row["descriptions"]); 
                }
            }

            return $tableauxContacts;

        } catch(PDOException $e) {
            echo "Erreur lors de la récupération des contacts : " . $e->getMessage();
            return [];
        }
    }

    public static function recupererContactParId($id) {
        try {
            global $connexion;

            $stmt = $connexion->prepare("SELECT * FROM contacts WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;


        } catch(PDOException $e) {

            echo "Erreur lors de la récupération du contact : " . $e->getMessage();
            return [];
        }
    }
}

?>
