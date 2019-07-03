<?php 
class PostgreSQL {
    
	var $conn;
	
	function connect () {
		try {
			$this->conn = new PDO('pgsql:host=localhost; port=5432; dbname=usercontrol; user=admin; password=******');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e){
			return $e;
		}
	}

	function select ($sql='', $parameters=array()) {
		
		//print $sql;
		//var_dump($parameters);

		if($sql != ''){
				
			try {

				$this->connect();
				$list = array();
				$rs = $this->conn->prepare($sql);
				
				if($rs->execute($parameters)){
					if($rs->rowCount() > 0){
						$i = 0;
						while($row = $rs->fetch(PDO::FETCH_OBJ)){
							$list[$i] = $row;
							$i++;
						}
					}

					$return = $list;
				} else 
					$return = "Error: Badly formatted SQL!";
			} catch (PDOException $e){
				//print $e->getMessage();
				$return = "Error: Badly formatted SQL!";
			}
			
			
				
		} else 
			$return = 'Error: No SQL statement!';
		
		
		return $return; 
		
	}
	
}

?>