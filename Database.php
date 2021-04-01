<?php
	namespace App;
	use mysqli;
	use Exception;

	class Database {
		private $connection = null;

		public function __construct(
			$dbhost = "localhost",
			$dbname = "gesuas",
			$username = "root",
			$password = "root"
		)
		{
			try {
				$this->connection = new mysqli($dbhost, $username, $password, $dbname);
		
	            if (mysqli_connect_errno()) {
	                throw new Exception("Não foi possível conectar ao banco de dados.");   
	            }
            } catch(Exception $e) {
                throw new Exception($e->getMessage());   
            }
		}

		public function select($query = "", $params = [])
		{
			try {
				$stmt = $this->executeStatement($query, $params);
		
	            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	            $stmt->close();
			
	            return $result;
			} catch(Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		public function insert($query = "", $params = [])
		{
			try {
				$stmt = $this->executeStatement($query, $params);
	            $stmt->close();
			
	            return $this->connection->insert_id;
			} catch(Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		private function executeStatement($query = "", $params = [])
		{
			try {
				$stmt = $this->connection->prepare($query);
		
	            if ($stmt === false) {
	                throw New Exception("Não foi possível executar a consulta: " . $query);
	            }

	            if ($params) {
	                call_user_func_array([$stmt, 'bind_param'], $params);
	            }
			
	            $stmt->execute();
			
	            return $stmt;
			} catch(Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
	}