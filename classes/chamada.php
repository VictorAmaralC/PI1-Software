<?php

    class Chamada {
            
        private $dataHoraInicio;
        private $dataHoraFim;

        public function getDataHoraInicio(){
            return $this->dataHoraInicio;
        }
        public function setDataHoraInicio($dataHoraInicio) {
            $this->dataHoraInicio = $dataHoraInicio;
        }
        public function getDataHoraFim(){
            return $this->dataHoraFim;
        }
        public function setDataHoraFim($dataHoraFim) {
            $this->dataHoraFim = $dataHoraFim;
        }

    }