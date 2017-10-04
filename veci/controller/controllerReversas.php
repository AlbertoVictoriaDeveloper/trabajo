<?php

require_once "./model/reversasModel.php";

class controllerReversas {

    public $reversasModel;

    public function __construct($config) {

        $this->reversasModel = new reversasModel($config);
    }

    public function getUpdateAudio($membresia) {
        return $this->reversasModel->updateStatus($membresia);
    }

    public function getDeleteCali($audioID) {
        return $this->reversasModel->deleteCalifacion($audioID);
    }

    public function getDeleteDetalle($audioID) {
        return $this->reversasModel->deleteDetalles($audioID);
    }

}