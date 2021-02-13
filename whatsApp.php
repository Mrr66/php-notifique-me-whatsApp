<?php

class WhatsApp{
    private $msg;
    private $titulo;
    private $numero;
    private $urlBase = "https://notifique-me.herokuapp.com";
    private $clienteId = "seu clienteId";
    private $secretKey = "Sua chave secreta";
    private $grupo = null;
    private $token = null;

    function __construct($msg, $numero, $titulo = 'Cartorio online 2BH ') {
        $this->msg .= $titulo;
        $this->msg .= $msg;
        $this->numero = $numero;

        $this->token = $this->authorization($this->clienteId, $this->secretKey);
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
        $ch = curl_init("$this->urlBase/api/Notificacao/v1");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Retorna dados da api
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: bearer '.$this->token,
            'Content-Length: ' . strlen($json))
        
        );
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if($httpcode == 401)
            echo "Não autorizado para enviar dados codigo http: $httpcode";
        echo $result;
        //echo "Todas as mensagens foram enviada com sucesso ";
    }

    private function authorization($clienteId, $secretKey)
    {
        $ch = curl_init("$this->urlBase/api/Login/autenticar/v1?clienteId=$clienteId&secreteKey=$secretKey");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Retorna dados da api
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Length: ' . strlen($json))
        );
        $json = curl_exec($ch);
        $object = json_decode($json);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if($httpcode != 200)
            echo "Erro ao autorizar, verifique suas credenciais. Codigo http: $httpcode";
        
        return $object->token;
    }
}
