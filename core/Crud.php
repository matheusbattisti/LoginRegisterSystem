<?php 

	namespace Core;

	use Conn;

	abstract class Crud {

		protected $db;
		protected $table;

		public function __construct() {
			$this->db = new Conn;
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

	}