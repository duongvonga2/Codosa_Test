<?php 
	require_once '../config.php';
	// echo DB_USER;

	class Database{
		private $_connetion;
		private $_dbHost = HOST_NAME;
		private $_dbUser = DB_USER;
		private $_dbPassword = DB_PASSWORD;
		private $_dbName = DB_NAME;

		function __construct(){
			$this->_connection = mysqli_connect($this->_dbHost, $this->_dbUser, $this->_dbPassword, $this->_dbName);
			if(mysqli_connect_errno($this->_connection)){
				die('Connect to database fail' . mysqli_connect_error());
			}
			else echo 'connect to database success';
		}	

		function getAllRows($table_name){
			$querry="SELECT * FROM $table_name";
			$result = mysqli_query($this->_connection,$qerry);
			if($this->_connection->error){
				die('get data from $table_name faile ' . mysqli_error($this->_connection));
			}
			else {
				echo 'select success';
				return $result;
			}
		}

		function updateData( $query){
			$this->_connection->query($query);
			if($this->_connection->error){
				try {    
			        throw new Exception("MySQL error $mysqli->error. Query: $query", $this->_connection->errno);    
			    } 
			    catch(Exception $e ) {
			        echo "Error No: ".$e->getCode(). " - ". $e->getMessage();
			        // echo nl2br($e->getTraceAsString());
			    }
			}
			else echo 'udpate success';
		}

		function getRowsWithCondition($table_name,$condition){
			$query = "SELECT * FROM $table_name WHERE $condition";
			echo "\n $query";
			$result = mysqli_query($this->_connection, $query);
			if($this->_connection->error){
				die( 'get data from $table_name where $condition faile' . mysqli_error($this->_connection));
			}
			else 
			return $result;
		}

		function disconnectDB(){
			$this->_connection->close();
		}
		
	}



	// $db = new Database;
	// $db->getAllRows('users');
	// $db->connectDB();
?>

