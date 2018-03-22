<?php 

$_ENV['host'] = "127.0.0.1";
$_ENV['user'] = "root";
$_ENV['db'] = "tourdefrance";
$_ENV['passwdt'] = "";

class Etape {

	    private static $_pdo;
		private static $_pdos_select;
		private static $_pdos_selectAll;
		private static $_pdos_insert;
		private static $_pdos_update;
		private static $_pdos_delete;

		
		public $id_etape;
		public $type_etape;
		public $lieu_depart;
		public $lieu_arrive;
		public $distance_gen;

		
		/* Initialisation de la connexion et mémorisation de l'instance PDO dans LivreMetier::$_pdo */ 	
		
		public static function initPDO() {
        self::$_pdo = new PDO("mysql:host=".$_ENV['host'].";dbname=".$_ENV['db'],$_ENV['user'],$_ENV['passwdt']);
        // pour récupérer aussi les exceptions provenant de PDOStatement
        self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		/* méthode statique instanciant LivreMetier::$_pdo_select */ 
       
		public static function initPDOS_select() {
        self::$_pdos_select = self::$_pdo->prepare('SELECT * FROM etape WHERE id_etape= :id_etape');
    }
	
		/* préparation de la requête SELECT * FROM livre
		 * instantiation de self::$_pdos_selectAll */
		
		public static function initPDOS_selectAll() {
        self::$_pdos_selectAll = self::$_pdo->prepare('SELECT * FROM etape');
    }
	
		/* méthode statique instanciant LivreMetier::$_pdo_insert */ 
	    public static function initPDOS_insert() {
        self::$_pdos_insert = self::$_pdo->prepare('INSERT INTO etape VALUES(:id_etape,:type_etape,:lieu_depart,:lieu_arrive,:distance_gen)');
    }
	
		/* méthode statique instanciant LivreMetier::$_pdo_update */ 
		public static function initPDOS_update() {
        self::$_pdos_update =  self::$_pdo->prepare('UPDATE etape SET type_etape=:type_etape,lieu_depart=:lieu_depart,lieu_arrive=:lieu_arrive,distance_gen=:distance_gen WHERE id_etape=:id_etape');
    }
	   /*  méthode statique instanciant LivreMetier::$_pdo_delete */ 
		public static function initPDOS_delete() {
        self::$_pdos_delete = self::$_pdo->prepare('DELETE FROM etape WHERE id_etape=:id_etape');
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
		public static function sel($id_etape) {
        try {
	        if (!isset(self::$_pdo))
	            self::initPDO();
	        if (!isset(self::$_pdos_select))
	            self::initPDOS_select();
	        self::$_pdos_select->bindValue(':id_etape',$id_etape);
	        self::$_pdos_select->execute();
        // résultat du fetch dans une instance de LivreMetier
	        $lm = self::$_pdos_select->fetchObject('etape');
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
            $humains = self::$_pdos_selectAll->fetchAll(PDO::FETCH_CLASS,'etape');
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
            self::$_pdos_insert->bindParam(':id_etape', $this->id_etape);
            self::$_pdos_insert->bindParam(':type_etape', $this->type_etape);
			self::$_pdos_insert->bindParam(':lieu_depart', $this->lieu_depart);
            self::$_pdos_insert->bindParam(':lieu_arrive', $this->lieu_arrive);
            self::$_pdos_insert->bindParam(':distance_gen', $this->distance_gen);

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
            self::$_pdos_update->bindParam(':id_etape', $this->id_etape);
			self::$_pdos_update->bindParam(':type_etape', $this->type_etape);
			self::$_pdos_update->bindParam(':lieu_depart', $this->lieu_depart);
            self::$_pdos_update->bindParam(':lieu_arrive', $this->lieu_arrive);
			self::$_pdos_update->bindParam(':distance_gen', $this->distance_gen);
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
            self::$_pdos_delete->bindParam(':id_etape', $this->id_etape);
            self::$_pdos_delete->execute();
        }
		 $this->setNouveau(TRUE);

    }
			       

		/* affichage élémentaire */ 
		public function __toString() {
        $ch = "<table align='center' ><tr>";
        $ch.= "<td id='l'>".$this->id_etape."</td>";
        $ch.= "<td>".$this->type_etape."</td>";
        $ch.= "<td>".$this->lieu_depart."</td>";
		$ch.= "<td>".$this->lieu_arrive."</td>";
		$ch.= "<td>".$this->distance_gen."</td>";
        $ch.= "</tr></table>";
        return $ch;
    }
}			
		
?> 