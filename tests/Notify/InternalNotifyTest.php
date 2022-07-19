<?php 

namespace Edsongr\ESOIO\Notify;

use \PHPUnit\Framework\TestCase;

class InternalNotifyTest extends TestCase
{

    public function testGetGroupsUserByNotifyClass()
    {
        $notify = new Notify(new InternalNotify());
 
        $groups = $notify->getGroupsByUser(1);

        $this->assertIsArray($groups);

        if (isset($groups[0]))
            $this->assertArrayHasKey('id', (array) $groups[0]);
    }

    public function testSendMessageForAllSimple()
    {

        $notify = new Notify(new InternalNotify);
        $notify->setMessage('Nova solicitação de atendimento recebida!');
        
        $result = $notify->sendNotify();

        $expected = array(
            'success' => true, 
            'message' => "Mensagem recebida com sucesso!"
        );

        $this->assertEquals($expected, $result);
    }

    public function testSendMessageForAllFull()
    {

        $notify = new Notify(new InternalNotify);
        $notify->setSender('Edson');
        $notify->setReceiver('ALL');
        $notify->setTitle('ATENÇÃO:');
        $notify->setMessage('Pedido de Nº 8 recebido na loja virtual vendamais.com.br');
        $notify->setSong(true);
        $notify->setTypeAlert('DANGER');
        $result = $notify->sendNotify();

        $expected = array(
            'success' => true, 
            'message' => "Mensagem recebida com sucesso!"
        );

        $this->assertEquals($expected, $result);
    }

    public function testMessageOneGroup()
    {

        $notify = new Notify(new InternalNotify);
        $notify->setSender('Edson');
        $notify->setReceiver('manager');
        $notify->setTitle('ATENÇÃO:');
        $notify->setMessage('Reunião agendada para dia 15/07 as 14h30');
        $notify->setSong(true);
        $notify->setTypeAlert('SUCCESS');
        $result = $notify->sendNotify();

        $expected = array(
            'success' => true, 
            'message' => "Mensagem recebida com sucesso!"
        );

        $this->assertEquals($expected, $result);
    }

    public function testMessageMoreThanOneGroup()
    {
        $notify = new Notify(new InternalNotify);
        $notify->setSender('Edson');
        $notify->setReceiver('manager,supervisor');
        $notify->setTitle('REUNIÃO:');
        $notify->setMessage('Apresentação dos Resultados de vendas');
        $notify->setSong(true);
        $notify->setTypeAlert('SUCCESS');
        $result = $notify->sendNotify();

        $expected = array(
            'success' => true, 
            'message' => "Mensagem recebida com sucesso!"
        );

        $this->assertEquals($expected, $result);
    }

    public function testMessageWithoutBody()
    {

        $notify = new Notify(new InternalNotify);
        $notify->setSender('ADM');
        $notify->setReceiver('ALL');
        $notify->setTitle('REUNIÃO:');
        $notify->setSong(true);
        $notify->setTypeAlert('WARNING');
        $result = $notify->sendNotify();

        $expected = array(
            'success' => false, 
            'message' => "Preencha o corpo da Mensagem. Use o metodo ->setMessage('sua mensagem');!"
        );

        $this->assertEquals($expected, $result);
    }

    // public function testMessageWithoutReceivers()
    // {

    // }

    // public function testMessageWrongGroup()
    // {
        
    // }

}