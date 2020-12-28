# Notifique-me SDK .net core
 Primeiro passo para usar o cliente de notificação(WhastApp || SMS) || (WhatsApp && SMS) basta usar o gerenciado de pacote **nuget**
 
 > ` Install-Package Notifique-me -Version 1.0.3 `

 ### 1- Criando uma conexão com as credenciais obtida em https://cad-notifique-me.herokuapp.com/ neste exemplo o programador usa o secretKey e o clienteId

```c#
private Autorization client = new Autorization("Sua chave secreta", "Seu clienteID");
```
### 1.1 Agora com o cliente criado iremos fazer um teste para ver se as credencias estão OK.

```c#
var test = client.GetBusiness();
Console.WriteLine("Empresa: {0}", test.RazaoSocial);
```
Se tudo estiver certo você vera no nome da empresa cadastrada

## 2 Com as credenciais testada e sem erro será possivel enviar uma notificação e até mesmo ver o status de uma notificação.

### 2.1 Enviando uma notificação via WhatsApp
```c#
var sent = client.Send(new Notification() 
            { 
                Numero = 5531989715963,
                Msg = "Oi este é um teste feito com a biblioteca Notifique.me",
                Type = TypeNotification.WHATSAPP
            });
```
Na variavel *sent* você tera o status de retorno

### 2.2 Enviando uma notificação via SMS
```c#
var sent = client.Send(new Notification() 
            { 
                Numero = 5531989715963,
                Msg = "Oi este é um SMS de teste feito com a biblioteca Notifique.me",
                Type = TypeNotification.SMS
            });
```

### 2.3 Enviando uma notificação via WhatsApp e SMS. 
###### Obs: este exemplo para uso comercial tem cobrança adcional 
```c#
var sent = client.Send(new Notification() 
            { 
                Numero = 5531989715963,
                Msg = "Oi você recebeu um SMS e uma msg no WhatsApp feito com a biblioteca Notifique.me",
                Type = TypeNotification.WHATSAPP_SMS
            });
```

### 2.4 Listando notificação por tipo de envio

```c#
 var listSms = await client.GetNotificationByTypeAsync(TypeNotification.SMS);

 var listWhatsApp = await client.GetNotificationByTypeAsync(TypeNotification.WHATSAPP);
 ```
 #### O exemplo 👆 mostra como obter uma lista de notificações enviada pelo tipo de notificação.

### 2.5 Para listar todas as notificações sem o tipo basta seguir o exemplo abaixo.

```c#
 var notifications = await client.ListNoticationAsync();
```

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