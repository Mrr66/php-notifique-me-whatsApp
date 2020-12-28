<?php

class WhatsApp{
    private $msg;
    private $titulo;
    private $numero;
    private $url = "https://notifique-me.herokuapp.com/api/Notificacao/v1";
    private $clienteId = "2ca97dd3-3deb-46a7-b450-26924b91d4de";
    private $grupo = "ccd796bf-5b75-4c9d-90ac-f51e816adab9";

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