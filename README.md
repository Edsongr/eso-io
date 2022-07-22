# ESO-IO

# BAIXE AS DEPENDÊNCIAS
<code>
    Composer install
    npm install
</code>


# IMPORT CSS 
 * Import o css para o sistema ou pagina que irá receber as notificações 

<code>
    <link href="notify-eso.css" rel="stylesheet">
</code>


# IMPORT JS 
 * Import o js para o sistema ou pagina que irá receber as notificações 

<code>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script src="notify-eso.js"></script>
</code>

# CRIAÇÃO DB
 ...


# EXEMPLOS DE USO 
    Na página PHP onde será a origem dos envios das mensagens 

<code>
    use Edsongr\ESOIO\Notify\Notify;
    use Edsongr\ESOIO\Notify\InternalNotify;
</code>


    Instancie a class:

<code>
    $notify = new Notify(new InternalNotify);
</code>


 * Exemplo de envio simples: 
<code>
    $notify = new Notify(new InternalNotify);
    $notify->setMessage('Nova solicitação de atendimento recebida!');
    $result = $notify->sendNotify();
</code>

 * Exemplo de envio completo: 
<code>
    $notify = new Notify(new InternalNotify);
    $notify->setSender('Edson');
    $notify->setReceiver('ALL');
    $notify->setTitle('ATENÇÃO:');
    $notify->setMessage('Pedido de Nº 8 recebido na loja virtual vendamais.com.br');
    $notify->setSong(true);
    $notify->setPulse(true);
    $notify->setTypeAlert('DANGER');
    $result = $notify->sendNotify();
</code>

 * Para enviar para um grupo de usuários apenas: 
<code>
    $notify->setReceiver('manager')
</code>

 * Para enviar para mais de um grupo de usuário:
<code>
    $notify->setReceiver('manager,supervisor');
</code>

# Certifique se duas novas tabelas foram criadas 
    * são: notify_groups e notify_group_user
    * Caso não tenham sido criadas, rodar as queries localizada em src/Template/docs/queries, direto no seu banco.


# SUBIR SERVER NODE 
    * Por fim suba o servidor node, digitando o comando:

<code>
    composer server-io
</code>
