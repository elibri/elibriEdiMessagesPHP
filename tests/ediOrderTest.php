<?php

  require_once(dirname(__FILE__) . '/../elibriEdiMessages.php');

  class EdiOrderTest extends PHPUnit_Framework_TestCase {

     public function load_message($filename) {
       return file_get_contents(dirname(__FILE__) . "/messages/$filename");
     }

     public function testParsingEdiOrder() {
       $json_message = $this->load_message("order.json");
       $message = EdiMessage::parse($json_message);
       $this->assertInstanceOf('EdiOrder', $message);
       $this->assertEquals('SK/1/2014', $message->buyer_number);
       $this->assertEquals('11', $message->buyer_id);
       $this->assertEquals('23', $message->seller_id);
       $this->assertEquals('11', $message->delivery_id);
       $this->assertEquals('2014-08-19', $message->order_date);
       $this->assertEquals('2014-08-23', $message->requested_date);
       $this->assertEquals('2014-08-24', $message->due_date);
       $this->assertEquals('single', $message->despatching_mode);
       $this->assertEquals('with_despatch', $message->invoicing_mode);

       $this->assertCount(2, $message->line_items);
       $this->assertEquals('2', $message->line_items[0]->quantity);
       $this->assertEquals('23.73', $message->line_items[0]->net_price);
       $this->assertEquals('5', $message->line_items[0]->tax_rate);
       $this->assertEquals('9788388722639', $message->line_items[0]->ean);
       $this->assertEquals('SK101', $message->line_items[0]->buyer_code);
       $this->assertEquals('Pamięć miłości', $message->line_items[0]->description);
       $this->assertEquals('1', $message->line_items[0]->position);

       $this->assertEquals('3', $message->line_items[1]->quantity);
       $this->assertEquals('25.2', $message->line_items[1]->net_price);
       $this->assertEquals('5', $message->line_items[1]->tax_rate);
       $this->assertEquals('9788388722684', $message->line_items[1]->ean);
       $this->assertEquals('SK102', $message->line_items[1]->buyer_code);
       $this->assertEquals('Dziedzictwo ziemi', $message->line_items[1]->description);
       $this->assertEquals('2', $message->line_items[1]->position);


       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }

     public function testConstructingEdiOrder() {
       $message = new EdiOrder();
       $json_message = $this->load_message("order.json");
       $message->buyer_number = 'SK/1/2014';
       $message->buyer_id = '11';
       $message->seller_id = '23';
       $message->delivery_id = '11';
       $message->order_date = '2014-08-19';
       $message->requested_date = '2014-08-23';
       $message->due_date = '2014-08-24';
       $message->despatching_mode = 'single';
       $message->invoicing_mode = 'with_despatch';
       $message->line_items[] = new EdiLineItem(array('quantity' => '2', 'net_price' => '23.73', 'tax_rate' => '5', 'ean' => '9788388722639', 
                                                      'buyer_code' => 'SK101', 'description' => 'Pamięć miłości', 'position' => '1'));
       $message->line_items[] = new EdiLineItem(array('quantity' => '3', 'net_price' => '25.2', 'tax_rate' => '5', 'ean' => '9788388722684', 
                                                      'buyer_code' => 'SK102', 'description' => 'Dziedzictwo ziemi', 'position' => '2'));
       
       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }
  }

?>
