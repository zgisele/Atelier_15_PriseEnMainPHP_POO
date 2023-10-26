<?php



// -----------------------------Questionnaire-----------------------------------------------
// Mini projet
// 1)Represente les entité "Etudiant"et "professeur"suivantla poo en php.
// 2)Utilisez les notions de getters ,setter et de constructeurs.
// 3)Mettez en place une interface pour professeure avec la definition de toutes ses methodes.
// 4)Mettez le projet sur git hub.

interface InterfaceEtudient {

    public function Presenter();
    public function evaluerEtudiant($date_eva);
    

}


class Etudient  {

    private $nom;
    private $prenom;
    private $matricule;
    public $dateNaissance;



    public function __construct($nom,$prenom,$matricule,$dateNaissance)
    {
        
        $this->setnom($nom);
        $this->setprenom($prenom);
        $this->setmatricule($matricule);
        // $this->matricule = $matricule;
        $this->setdateNaissance($dateNaissance);
        // $this->dateNaissance =$dateNaissance;
    }


    public function getnom(){
            return $this->nom;      
    }
    public function getprenom(){
            return $this->prenom;      
    }
    public function getmatricule(){
            return $this->matricule;      
    }
    public function getdateNaissance(){
            return $this->dateNaissance;      
    }
    public function setnom($nom){


        if (preg_match('/^[A-Za-z]+$/', $nom)) {
            $this->nom = $nom;
        } else {
            echo "Le nom '$nom' n'est pas valide.\n";
        }



    }
    public function setprenom($prenom){

        if (preg_match('/^[A-Za-z]+$/', $prenom)) {
            $this->prenom = $prenom;
        } else {
            echo "Le prenom '$prenom' n'est pas valide.\n";
        }


    }

    public function setmatricule($matricule){

        // Vérification de la validité du matricule
        if (preg_match('/^\d{5}$/', $matricule)) {
            $this->matricule = $matricule;
        } else {
            echo "Le matricule '$matricule' n'est pas valide. Il doit contenir exactement 6 chiffres.\n";
        }

    }
    
    public function setdateNaissance($dateNaissance){

        $date = DateTime::createFromFormat('Y-m-d',$dateNaissance);

                // $date= strtotime("Y-m-d",$dateNaissance);
        try {
        
            if ($date && $date->format('Y-m-d')===$dateNaissance) {

                $this->dateNaissance = $dateNaissance;
                return $this;
            }
        } catch (Exception $th) {
            $th->getMessage();
        }

        
    }

    

    function Presenter(){
       
        echo"bonjour, je suis étudiant.e ,je m'appelle  ".$this->nom."  ". $this->prenom." je suis née le ".$this->dateNaissance."  mon matricul est: ".$this->matricule."<br>";
        
    }


    function FaireCours($FaireCours){

        echo" Bonjour je fais cours en ".$FaireCours."<br>";

    }

    function FaireEvaluation($DateEvaluation){


        // $date = DateTime::createFromFormat('Y-m-d',$DateEvaluation);

        //         // $date= strtotime("Y-m-d",$dateNaissance);
        // try {

        //     if ($date && $date->format('Y-m-d')===$DateEvaluation) {

        //         $this->DateEvaluation = $DateEvaluation;
        //         return $this->DateEvaluation;
        //     }
        // } catch (Exception $th) {
        //     $th->getMessage();
        // }
       
        echo"je dois faire une évaluation le  ".$DateEvaluation."<br>";

    }
}



$Etudiant1 = new Etudient('NGOM','agnes',20299,"2000-09-12");
$DateEvaluation = "2023-10-30";
$FaireCours = "Dev-Back";
$Etudiant1-> Presenter();
$Etudiant1 -> FaireCours($FaireCours);
$Etudiant1 -> FaireEvaluation($DateEvaluation);
// $Etudiant1->FaireEvaluation();
// $Etudiant1->FaireCours();


// --------------------------------------classe professeur-----------------------------------

class Professeur extends Etudient {
    private $specialité;
    private $salaire;
    private $voiture;



    public function __construct($nom,$prenom,$matricule,$dateNaissance,$specialité,$salaire,$voiture){
        parent::__construct($nom,$prenom,$matricule,$dateNaissance);
        $this->specialité = $specialité;
        $this->salaire = $salaire;
         $this->setvoiture($voiture);
        //  $this->voiture = $voiture;

    }

    public function getspecialité(){
        return $this->specialité;      
    }
    public function getsalaire(){
            return $this->salaire;      
    }
    public function getvoiture(){

            return $this->voiture ;    
    }
    public function setvoiture($reponse){

        if ($reponse === "oui" || $reponse === "non") {
            $this->voiture = $reponse;
        } else {
            echo "Réponse invalide. Veuillez répondre 'oui' ou 'non'.\n";
        }
    }


    

    function Presenter(){

        echo"Salut, je suis professeur ,je m'appelle  ".parent::getnom()."  ". parent::getprenom()." je suis née le ".parent::getdateNaissance()." mon matricul est: ".parent::getmatricule()." je sui specialiste en :".$this->specialité." je gagne en moyenne  ".$this->salaire."par mois.  Est ce que j'ai une voiture? ".$this->voiture."<br>";
        
    }

    function evaluerEtudiant($date_eva){
        echo"je dois faire une évaluation $date_eva";
    }
}


$Professeur1 = new Professeur("Guye","jean",46544,"1999-06-05","informatique",400000,"oui");
$date_eva = "2023-10-05";
$Professeur1->presenter(); 
$Professeur1->evaluerEtudiant($date_eva);

?>