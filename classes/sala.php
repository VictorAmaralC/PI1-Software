<?php

    class Sala {

        private $local;
        private $capacidade;

        public function getLocal(){
            return $this->local;
        }
        public function setCodigoDisciplina($local) {
            $this->local = $local;
        }
        public function getCapacidade(){
            return $this->capacidade;
        }
        public function setCapacidade($capacidade) {
            $this->capacidade = $capacidade;
        }

    }