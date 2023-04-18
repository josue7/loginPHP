<?php
    /** Desarrollado por Josué Marfil
     * @version 1.0
     * email: josue.marfilg@gmail.com
     * @license http://creativecommons.org/licenses/by-nc-sa/3.0/
     */

    //Incluimos la clase Database de la carpeta connection
    include 'connection/Database.php';

    //Creamos la clase User que extiende de la clase Database para poder usar los metodos de la clase Database en la clase Usuario(id, name, last_name, email, password, id_position), la contraseña se encripta con el metodo password_hash de php
    class User extends Database {
        private $id;
        private $name;
        private $last_name;
        private $email;
        private $password;
        private $id_position;

        public function __construct($id, $name, $last_name, $email, $password, $id_position) {
            $this->id = $id;
            $this->name = $name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = $password;
            $this->id_position = $id_position;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getLast_name() {
            return $this->last_name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getId_position() {
            return $this->id_position;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setLast_name($last_name) {
            $this->last_name = $last_name;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
            
        }

        public function setId_position($id_position) {
            $this->id_position = $id_position;
        }


        //Metodo para insertar un user en la base de datos con el metodo password_hash de php
        public function insertar() {
            $sql = "INSERT INTO user (name, last_name, email, password, id_position) VALUES (:name, :last_name, :email, :password, :id_position)";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', password_hash($this->password), PASSWORD_DEFAULT);
            $stmt->bindParam(':id_position', $this->id_position);
            $stmt->execute();
        }
        
        //Metodo para actualizar un user en la base de datos
        public function actualizar() {
            $sql = "UPDATE user SET name = :name, last_name = :last_name, email = :email, password = :password, id_position = :id_position WHERE id = :id";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password',  password_hash($this->password), PASSWORD_DEFAULT);
            $stmt->bindParam(':id_position', $this->id_position);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        }

        //Metodo para eliminar un user por email en la base de datos
        public function eliminar() {
            $sql = "DELETE FROM user WHERE email = :email";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        }

        //Metodo para obtener un user por email en la base de datos
        public function verifyByUser() {
            $sql = "SELECT name,last_name,email,password,id_position FROM user WHERE email = :email";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }

        //Metodo para obtener todos los user en la base de datos
        public function obtenerTodos() {
            $sql = "SELECT * FROM user";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }
    }
    
?>