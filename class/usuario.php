<?php 

	class Usuario {
		private $username;
		private $email;
		private $password;
		private $nombre;
		private $apellidos;
		private $centroUniversitario;
		private $grado_estudios;
		private $clave;

		function __construct(){

		}

		public function crear($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave){
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->centroUniversitario = $centroUniversitario;
			$this->grado_estudios = $grado_estudios;
			$this->clave = $clave;
		}

		public function editar($username){
			$this->username = $username;
		}

		public function mostrar($username){
			$this->username = $username;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getEmail(){
			return $this->email;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function getApellidos(){
			return $this->apellidos;
		}
		public function getCentroUniversitario(){
			return $this->centroUniversitario;
		}
		public function getGradoEstudios(){
			return $this->grado_estudios;
		}
		public function getClave(){
			return $this->clave;
		}

	}


?>