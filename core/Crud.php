<?php 

	namespace Core;

	use Core\Conn;

	abstract class Crud extends Conn {

		protected $db;
		protected $table;

		public function __construct(\PDO $db) {
			$this->db = $db;
		}

		public function fetchAll() {
			$query = "SELECT * FROM {$this->table}";
			return $this->db->query($query);
		}

		public function find($id) {
			$query = "SELECT * FROM {$this->table} WHERE id = :id";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function findByEmail($email) {
			$query = "SELECT * FROM {$this->table} WHERE email = :email";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(":email", $email);
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function insert($data)
		{
			if(!empty($this->table) && (is_array($data) && count($data) > 0)) {
				$sql = "INSERT INTO " . $this->table . " SET ";
				$dados = array();
				foreach($data as $chave => $valor) {
					$dados[] = $chave . " = '" . addslashes($valor) . "'";
				}
				$sql .= implode(", ", $dados);
				$this->db->query($sql);

				return true;
			}
		}

	}