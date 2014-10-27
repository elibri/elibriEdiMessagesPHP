<?php

  require_once(dirname(__FILE__) . '/../elibriEdiMessages.php');

  class EdiDespatchAdviceTest extends PHPUnit_Framework_TestCase {

     public function load_message($filename) {
       return file_get_contents(dirname(__FILE__) . "/messages/$filename");
     }

     public function testParsingEdiDespatchAdvice() {
       $json_message = $this->load_message("despatch_advice.json");
       $message = EdiMessage::parse($json_message);
       $this->assertInstanceOf('EdiDespatchAdvice', $message);
       $this->assertEquals('11', $message->order_id);
       $this->assertEquals('SK/1/2014', $message->order_buyer_number);
       $this->assertEquals('D/1/2014', $message->seller_number);

       $this->assertCount(2, $message->line_items);
       $this->assertEquals('0', $message->line_items[0]->quantity);
       $this->assertEquals('9788388722639', $message->line_items[0]->ean);
       $this->assertEquals('SK101', $message->line_items[0]->buyer_code);
       $this->assertEquals('Pamięć miłości', $message->line_items[0]->description);
       $this->assertEquals('1', $message->line_items[0]->position);

       $this->assertEquals('3', $message->line_items[1]->quantity);
       $this->assertEquals('9788388722684', $message->line_items[1]->ean);
       $this->assertEquals('SK102', $message->line_items[1]->buyer_code);
       $this->assertEquals('Dziedzictwo ziemi', $message->line_items[1]->description);
       $this->assertEquals('2', $message->line_items[1]->position);


       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }

     public function testConstructingEdiDespatchAdvice() {
       $message = new EdiDespatchAdvice();
       $json_message = $this->load_message("despatch_advice.json");
       $message->order_id = '11';
       $message->order_buyer_number = 'SK/1/2014';
       $message->seller_number = 'D/1/2014';
       $message->line_items[] = new EdiLineItem(array('quantity' => '0', 'ean' => '9788388722639', 'buyer_code' => 'SK101', 
                                                      'description' => 'Pamięć miłości', 'position' => '1'));
       $message->line_items[] = new EdiLineItem(array('quantity' => '3', 'ean' => '9788388722684', 'buyer_code' => 'SK102',
                                                      'description' => 'Dziedzictwo ziemi', 'position' => '2'));
       
       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }
  }

?>
