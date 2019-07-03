<?php 

require_once DBS."PostgreSQL.php";

class PostgreSQLTest {
    
	var $con;
	
	function connect () {
		$db = new PostgreSQL();
		$return = $db->connect();
		if($return != null)
			print "FALHA NO METODO CONNECT: Não foi possivel se conectar com o banco de dados! <br/>";
		else
			print "SUCESSO: Conexão ao banco de dados realizada com sucesso! <br/>";
	}
	
	function select () {
		
		// --
		$db = new PostgreSQL();
		$return = $db->select();
		if($return != "Error: No SQL statement!")
			print "FALHA NO METODO SELECT: Passou a consulta vazia! <br/>";
		else
			print "SUCESSO: Não foi informado nenhuma consulta SQL! <br/>";
		
		// --
		$return = $db->select("SELECT * FROM users WHERE user = ?;",array("admin","teste"));
		if($return != "Error: Badly formatted SQL!")
			print "FALHA NO METODO SELECT: Consulta  com parâmetros errados passou! <br/>";
		else
			print "SUCESSO: SQL mal formatado! <br/>";

		// --
		$return = $db->select("SELECT * FROM users WHERE \"user\" ILIKE ?;",array("admin"));
		if(!empty($return))
			print "SUCESSO: Consulta  realizada corretamente! <br/>";
		else
			print "FALHA NO METODO SELECT: Consulta não deveria estar apresentando erro! <br/>";
						
		
	}
	
}

?>