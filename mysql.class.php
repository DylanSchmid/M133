<?php
	class DBConnector{
		
		private $user = "root";
		private $password = "";
		
		public $db = null;
		
		public function createConnection(){
			$this->db = new PDO('mysql:host=localhost;dbname=eventdb', $this->user, $this->password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		
		public function closeConnection(){
			$this->db = null;
		}
		
		public function getLogin($username){
			$username = htmlspecialchars($username, ENT_QUOTES, 'utf-8');
			
			$this->createConnection();
			
			$stmt = $this->db->prepare('SELECT * FROM login WHERE username = :user');
			$stmt->bindParam(':user', $username);
			$stmt->execute();
			
			$row = $stmt->fetch();
			
			$this->closeConnection();
			return $row;
		}
		
		public function getLanguages(){
			$this->createConnection();
			
			$stmt = $this->db->prepare("SELECT * FROM languages");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$this->closeConnection();
			
			return $stmt;
		}
		
		public function getGroups(){
			$this->createConnection();
			
			$stmt = $this->db->prepare("SELECT * FROM groups");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$this->closeConnection();
			
			return $stmt;
		}
		
		public function getCountrys(){
			$this->createConnection();
			
			$stmt = $this->db->prepare("SELECT * FROM countrys");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$this->closeConnection();
			
			return $stmt;
		}
		
		public function insertInscription($lastName, $firstName, $street, $place, $postcode, $email, $groupId, $countryId, $languageId){
			
			try {
				$this->createConnection();
				
				$stmt = $this->db->prepare("INSERT INTO inscription (lastname, firstname, street, place, postcode, email, group_fk, country_fk, language_fk) VALUES (:lastName, :firstName, :street, :place, :postcode, :email, :groupId, :countryId, :languageId)");
				
				$stmt->execute(array(
								"lastName" => $lastName,
								"firstName" => $firstName,
								"street" => $street,
								"place" => $place,
								"postcode" => $postcode,
								"email" => $email,
								"groupId" => $groupId,
								"countryId" => $countryId,
								"languageId" => $languageId
								)
				);
				
				$this->closeConnection();
			}
			catch (PDOException $e){
				echo $e->getMessage();
			}
			
		}
		
	}
?>