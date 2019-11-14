<?php

    class Turma {

        private $codigoDisciplina;
        private $nomeTurma;
        private $diaHorario;

        public function getCodigoDisciplina(){
            return $this->codigoDisciplina;
        }
        public function setCodigoDisciplina($codigoDisciplina) {
            $this->codigoDisciplina = $codigoDisciplina;
        }
        public function getNomeTurma(){
            return $this->nomeTurma;
        }
        public function setNomeTurma($nomeTurma) {
            $this->nomeTurma = $nomeTurma;
        }
        public function getDiaHorario(){
            return $this->diaHorario;
        }
        public function setDiaHorario($diaHorario) {
            $this->diaHorario = $diaHorario;
        }
    }