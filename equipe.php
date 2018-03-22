<?php 

$_ENV['host'] = "127.0.0.1";
$_ENV['user'] = "root";
$_ENV['db'] = "tourdefrance";
$_ENV['passwdt'] = "";

class Equipe {

	    private static $_pdo;
		private static $_pdos_select;
		private static $_pdos_selectAll;
		private static $_pdos_insert;
		private static $_pdos_update;
		private static $_pdos_delete;

		
		public $id_equipe;
		public $nom_equipe;
		

		
		/* Initialisation de la connexion et mémorisation de l'instance PDO dans LivreMetier::$_pdo */ 	
		
		public static function initPDO() {
        self::$_pdo = new PDO("mysql:host=".$_ENV['host'].";dbname=".$_ENV['db'],$_ENV['user'],$_ENV['passwdt']);
        // pour récupérer aussi les exceptions provenant de PDOStatement
        self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		/* méthode statique instanciant LivreMetier::$_pdo_select */ 
       
		public static function initPDOS_select() {
        self::$_pdos_select = self::$_pdo->prepare('SELECT * FROM equipe WHERE id_equipe= :id_equipe');
    }
	
		/* préparation de la requête SELECT * FROM livre
		 * instantiation de self::$_pdos_selectAll */
		
		public static function initPDOS_selectAll() {
        self::$_pdos_selectAll = self::$_pdo->prepare('SELECT * FROM equipe');
    }
	
		/* méthode statique instanciant LivreMetier::$_pdo_insert */ 
	    public static function initPDOS_insert() {
        self::$_pdos_insert = self::$_pdo->prepare('INSERT INTO equipe VALUES(:id_equipe,:nom_equipe)');
    }
	
		/* méthode statique instanciant LivreMetier::$_pdo_update */ 
		public static function initPDOS_update() {
        self::$_pdos_update =  self::$_pdo->prepare('UPDATE equipe SET nom_equipe=:nom_equipe WHERE id_equipe=:id_equipe');
    }
	   /*  méthode statique instanciant LivreMetier::$_pdo_delete */ 
		public static function initPDOS_delete() {
        self::$_pdos_delete = self::$_pdo->prepare('DELETE FROM equipe WHERE id_equipe=:id_equipe');
    }


		/*
		*  attribut interne pour différencier les nouveaux objets des objets créés côté applicatif de ceux issus du SGBD
		*  @var $nouveau */ 
		private $nouveau = TRUE;
	    
		/* @return $this->nouveau */ 
		public function getNouveau(){
        return $this->nouveau;
    }

		/* @param $nouveau */ 
		public function setNouveau($nouveau) {
        $this->nouveau=$nouveau;
    }
		
		/**
		* initialisation d'un objet métier à partir d'un enregistrement de livre
		* @param $liv_num un identifiant de livre
		* @return l'instance de LivreMetier associée à $liv_num
		*/ 
		public static function sel($id_equipe) {
        try {
	        if (!isset(self::$_pdo))
	            self::initPDO();
	        if (!isset(self::$_pdos_select))
	            self::initPDOS_select();
	        self::$_pdos_select->bindValue(':id_equipe',$id_equipe);
	        self::$_pdos_select->execute();
        // résultat du fetch dans une instance de LivreMetier
	        $lm = self::$_pdos_select->fetchObject('equipe');
	        if (isset($lm) && ! empty($lm))
	            $lm->setNouveau(FALSE);
	        if (empty($lm))
                throw new Exception("ERROR.\n");
	        return $lm;
        }
        catch (PDOException $e) {
	        print($e);
        }
    }

		/* @return un tableau de tous les LivreMetier */
		public static function getAll() {
        try {
            if (!isset(self::$_pdo))
                self::initPDO();
            if (!isset(self::$_pdos_selectAll))
                self::initPDOS_selectAll();
            self::$_pdos_selectAll->execute();
            // résultat du fetch dans une instance de LivreMetier
            $humains = self::$_pdos_selectAll->fetchAll(PDO::FETCH_CLASS,'equipe');
            return $humains;
        }
		
		   catch (PDOException $e) {
            print($e);
        }
    }
	
	
		/**
		* sauvegarde d'un objet métier
		* soit on insère un nouvel objet
		* soit on le met à jour
		*/ 
		public function ins() {
        if (!isset(self::$_pdo))
            self::initPDO();
        if ($this->nouveau) {
		
            if (!isset(self::$_pdos_insert)) {
	        self::initPDOS_insert();
            self::$_pdos_insert->bindParam(':id_equipe', $this->id_equipe);
            self::$_pdos_insert->bindParam(':nom_equipe', $this->nom_equipe);
            self::$_pdos_insert->execute();
            $this->setNouveau(FALSE);
			}
			}}
			
	    public function upd() {		
		 if (!isset(self::$_pdo))
            self::initPDO();
		if (!isset(self::$_pdos_update))
	        {
			self::initPDOS_update();
            self::$_pdos_update->bindParam(':id_equipe', $this->id_equipe);
			self::$_pdos_update->bindParam(':nom_equipe', $this->nom_equipe);
            self::$_pdos_update->execute();}
			}
			
			
		/* suppression d'un objet métier */ 
		public function sup() {
        if (!isset(self::$_pdo))
            self::initPDO();
		if ($this->nouveau) {
            if (!isset(self::$_pdos_delete)) {
	            self::initPDOS_delete();
            }
            self::$_pdos_delete->bindParam(':id_equipe', $this->id_equipe);
            self::$_pdos_delete->execute();
        }
		 $this->setNouveau(TRUE);

    }
			       

		/* affichage élémentaire */ 
		public function __toString() {
        $ch = "<table align='center' ><tr>";
        $ch.= "<td id='l'>".$this->id_equipe."</td>";
        $ch.= "<td>".$this->nom_equipe."</td>";
        $ch.= "</tr></table>";
        return $ch;
    }
}			
		
?> 