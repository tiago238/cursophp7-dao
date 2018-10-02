<?php 

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;
	
	public function getIdusuario(){
		return $this->$idusuario;
	}

	public function setIdusuario($value){

		echo "<br>";
		echo "Valor setIdusuario: ". $value;

		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->$deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->$dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->$dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){
		echo "interação 1: ".$id;
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		)); 
		echo "<br>";
		var_dump(count($results));

		if(count($results) > 0) {

			echo "<br>";
		var_dump(count($results));

			$row = $results[0];

			echo "<br>";
		var_dump($results[0]);

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}

	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	public static function search($login){
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(

			':SEARCH'=>"%".$login."%"

		));
	}

	public function login($login, $password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		)); 
		//echo "<br>";
		//var_dump(count($results));

		if(count($results) > 0) {

			//echo "<br>";
		//var_dump(count($results));

			$row = $results[0];

			//echo "<br>";
		//var_dump($results[0]);

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}else{

			throw new Exception("Login ou senha inválidos");
			
		}
	}
	
	//$user = $this->getIdusuario();
		//echo "Usuário: ".$user;
	
	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s"),
		));
	}
	

}

 ?>