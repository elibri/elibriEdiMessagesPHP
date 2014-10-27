<?php

  require_once(dirname(__FILE__) . '/../elibriEdiMessages.php');

  class EdiReceiveAdviceTest extends PHPUnit_Framework_TestCase {

     public function load_message($filename) {
       return file_get_contents(dirname(__FILE__) . "/messages/$filename");
     }

     public function testParsingEdiReceiveAdvice() {
       $json_message = $this->load_message("receive_advice.json");
       $message = EdiMessage::parse($json_message);
       $this->assertInstanceOf('EdiReceiveAdvice', $message);
       $this->assertEquals('11', $message->order_id);
       $this->assertEquals('PM/1/2014', $message->buyer_number);
       $this->assertEquals('122', $message->despatch_advice_id);

       $this->assertCount(1, $message->line_items);
       $this->assertEquals('3', $message->line_items[0]->quantity);
       $this->assertEquals('9788388722684', $message->line_items[0]->ean);
       $this->assertEquals('Dziedzictwo ziemi', $message->line_items[0]->description);
       $this->assertEquals('1', $message->line_items[0]->position);


       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }

     public function testConstructingEdiReceiveAdvice() {
       $message = new EdiReceiveAdvice();
       $json_message = $this->load_message("receive_advice.json");
       $message->order_id = '11';
       $message->buyer_number = 'PM/1/2014';
       $message->despatch_advice_id = '122';
       $message->line_items[] = new EdiLineItem(array('quantity' => '3', 'ean' => '9788388722684', 'description' => 'Dziedzictwo ziemi', 'position' => '1'));
       
       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }
  }

?>
