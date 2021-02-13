# Exemplo de uso da API com PHP
 Primeiro passo para usar o cliente de notificação(WhastApp || SMS) || (WhatsApp && SMS) usando a API notifique-me
 
 > ` Faça o download do arquivo `[whatsApp.php](ithub.com/Mrr66/php-notifique-me-whatsApp/edit/main/whatsApp.php)` adicione o mesmo em seu projeto`

 ### 1- Criando uma conexão com as credenciais obtida em https://cad-notifique-me.herokuapp.com/ neste exemplo o programador usa o secretKey e o clienteId
Abrar o arquivo whatsApp.php
```php
    private $msg;
    private $titulo;
    private $numero;
    private $urlBase = "https://notifique-me.herokuapp.com";
    private $clienteId = "Seu clienteId";
    private $secretKey = "Sua chave secreta";
    private $grupo = null;
    private $token = null;

    function __construct($msg, $numero, $titulo = 'Cartorio online 2BH ') {
        $this->msg .= $titulo;
        $this->msg .= $msg;
        $this->numero = $numero;

        $this->token = $this->authorization($this->clienteId, $this->secretKey);
    }
```
### 1.1 Com as credencias configurada vamos usar o metodo send para enviar uma mensagem.

```php
include("whatsApp.php");
$whats = new WhatsApp("Olá isso é uma msg disparada pelo PHP para o whatsApp com API notifique-me", 559000000000, "Isso é um teste"); 
$whats->send();
```
### Explicando o codigo acima:
* A primeira linha inclui o arquivo com as credenciais configurada para conectar na api.
* A segunda linha cria uma instancia passando no construtor a mensagem a ser enviada, o numero do destinatario com o codigo do país, por ultimo o titulo é opcional.
* A terceira e ultima usa apenas o metodo send para enviar uma mensagem no whatsApp do destinatario.

>
> ### Outras linguagens
>
> [C#, .net, SDK completo para instalar via nuget](https://github.com/Mrr66/Notifique.me)
> 
> [Python, modulo para instalar via pip](https://github.com/Mrr66/Notifique-me-python)


# Gostou do Notifique.me?
Agora basta por a mão na massa e sair notificando seus clientes e sua equipe, há para você que é um DEV dedicado e simplismente de graça basta cadastrar como desenvolvedor.

##### A limites diarios que são aplicado na conta de desenvolvedor diferentemente da conta Business que não a restrição de envio 

>
> ### Crie sua conta hoje mesmo é completamente gratis 
>
>* [Para mais informações acesse](https://cad-notifique-me.herokuapp.com/)
>
>* [Criar uma conta Empresarial](https://cad-notifique-me.herokuapp.com/business)
>
>* [Criar uma conta Desenvolvedor](https://cad-notifique-me.herokuapp.com/developer)
