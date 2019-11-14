<?php

    class Pessoa {

        protected $nome;
        protected $matricula;
        protected $token;
        protected $foto;
        
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getMatricula(){
            return $this->matricula;
        }
        public function setMatricula($matricula) {
            $this->matricula = $matricula;
        }
        public function getToken(){
            return $this->token;
        }
        public function setToken($token) {
            $this->token = $token;
        }

        public function CadastroDigital(){

        }

    }

