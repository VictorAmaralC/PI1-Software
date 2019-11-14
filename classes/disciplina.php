<?php

    class Disciplina {

        private $nomeDisciplina;
        private $codigo;

        public function getNomeDisciplina(){
            return $this->nomeDisciplina;
        }
        public function setNomeDisciplina($nomeDisciplina) {
            $this->nomeDisciplina = $nomeDisciplina;
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

    }