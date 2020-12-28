<?php

class WhatsApp{
    private $msg;
    private $titulo;
    private $numero;
    private $url = "";
    private $clienteId = "";
    private $grupo = "";

    function __construct($msg, $numero, $titulo = 'Cartorio online 2BH ') {
        $this->msg .= $titulo;
        $this->msg .= $msg;
        $this->numero = $numero;
    }

    public function Send(){
        # Setup request to send json via POST.
        $obj = new StdClass;
        $obj->Msg = $this->msg;
        $obj->Numero = $this->numero;
        $obj->Status = 0;
        $obj->ClienteId = $this->clienteId;
        $obj->Grupo = $this->grupo;

        $json = json_encode($obj);
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Retorna dados da api
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        
            'Content-Type: application/json',
        
            'Content-Length: ' . strlen($json))
        
        );
        $result = curl_exec($ch);
        curl_close ($ch);
       # echo "Todas as mensagens foram enviada com sucesso ";
    }
}
