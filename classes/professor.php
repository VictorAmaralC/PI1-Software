<?php
    include("../classes/pessoa.php");

    class Professor extends Pessoa {

        private $email;
        private $senha;

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }

        public function CadastrarAluno(){
            
        }
        public function IniciarChamada(){

        }    
        public function AbrirTurma(){

        }
        
    }