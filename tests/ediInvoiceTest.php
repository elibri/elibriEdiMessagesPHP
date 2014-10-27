<?php

  require_once(dirname(__FILE__) . '/../elibriEdiMessages.php');

  class EdiInvoiceTest extends PHPUnit_Framework_TestCase {

     public function load_message($filename) {
       return file_get_contents(dirname(__FILE__) . "/messages/$filename");
     }

     public function testParsingEdiInvoice() {
       $json_message = $this->load_message("invoice.json");
       $message = EdiMessage::parse($json_message);
       $this->assertInstanceOf('EdiInvoice', $message);
       $this->assertEquals('1/S/2014', $message->invoice_number);
       $this->assertEquals('i', $message->document_type);
       $this->assertEquals('23', $message->seller_id);
       $this->assertEquals('11', $message->buyer_id);
       $this->assertEquals('11', $message->delivery_detail_id);
       $this->assertEquals('11', $message->order_id);
       $this->assertEquals('SK/1/2014', $message->order_buyer_number);
       $this->assertEquals('2014-08-20', $message->invoice_date);
       $this->assertEquals('2014-08-20', $message->sales_date);
       $this->assertEquals('2014-09-03', $message->payment_due_date);
       $this->assertEquals('Wydawnictwo Tylko bestsellery sp. z o. o.', $message->seller_name);
       $this->assertEquals('ul Kolejowa 9/11', $message->seller_address);
       $this->assertEquals('Warszawa', $message->seller_city);
       $this->assertEquals('01-217', $message->seller_post_code);
       $this->assertEquals('9744287572', $message->seller_tax_id);
       $this->assertEquals('Księgarnia Świetne książki sp. z o. o.', $message->buyer_name);
       $this->assertEquals('Al. Niepodległości 1', $message->buyer_address);
       $this->assertEquals('Warszawa', $message->buyer_city);
       $this->assertEquals('02-653', $message->buyer_post_code);
       $this->assertEquals('1270286596', $message->buyer_tax_id);
       $this->assertEquals('Księgarnia Świetne książki sp. z. o.', $message->delivery_detail_name);
       $this->assertEquals('Al. Niepodległości 1', $message->delivery_detail_address);
       $this->assertEquals('Warszawa', $message->delivery_detail_city);
       $this->assertEquals('02-653', $message->delivery_detail_post_code);

       $this->assertCount(1, $message->line_items);
       $this->assertEquals('3', $message->line_items[0]->quantity);
       $this->assertEquals('25.2', $message->line_items[0]->net_price);
       $this->assertEquals('75.6', $message->line_items[0]->net_amount);
       $this->assertEquals('5', $message->line_items[0]->tax_rate);
       $this->assertEquals('3.78', $message->line_items[0]->tax_amount);
       $this->assertEquals('9788388722684', $message->line_items[0]->ean);
       $this->assertEquals('SK102', $message->line_items[0]->buyer_code);
       $this->assertEquals('Dziedzictwo ziemi', $message->line_items[0]->description);
       $this->assertEquals('1', $message->line_items[0]->position);


       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }

     public function testConstructingEdiInvoice() {
       $message = new EdiInvoice();
       $json_message = $this->load_message("invoice.json");
       $message->invoice_number = '1/S/2014';
       $message->document_type = 'i';
       $message->seller_id = '23';
       $message->buyer_id = '11';
       $message->delivery_detail_id = '11';
       $message->order_id = '11';
       $message->order_buyer_number = 'SK/1/2014';
       $message->invoice_date = '2014-08-20';
       $message->sales_date = '2014-08-20';
       $message->payment_due_date = '2014-09-03';
       $message->seller_name = 'Wydawnictwo Tylko bestsellery sp. z o. o.';
       $message->seller_address = 'ul Kolejowa 9/11';
       $message->seller_city = 'Warszawa';
       $message->seller_post_code = '01-217';
       $message->seller_tax_id = '9744287572';
       $message->buyer_name = 'Księgarnia Świetne książki sp. z o. o.';
       $message->buyer_address = 'Al. Niepodległości 1';
       $message->buyer_city = 'Warszawa';
       $message->buyer_post_code = '02-653';
       $message->buyer_tax_id = '1270286596';
       $message->delivery_detail_name = 'Księgarnia Świetne książki sp. z. o.';
       $message->delivery_detail_address = 'Al. Niepodległości 1';
       $message->delivery_detail_city = 'Warszawa';
       $message->delivery_detail_post_code = '02-653';
       $message->line_items[] = new EdiLineItem(array('quantity' => '3', 'net_price' => '25.2', 'net_amount' => '75.6', 
                                                      'tax_rate' => '5', 'tax_amount' => '3.78', 'ean' => '9788388722684', 
                                                      'buyer_code' => 'SK102', 'description' => 'Dziedzictwo ziemi', 'position' => '1'));

       $message->summary = new EdiInvoiceSummary(array('total_lines' => '1', 'net_amount' => '75.6', 'tax_amount' => '3.78', 
                                                       'gross_amount' => '79.38', 'items_count' => '1', 
                                                       'tax_rate_summaries' => array(array('tax_rate' => '5', 'net_amount' => '75.6', 
                                                       'tax_amount' => '3.78', 'gross_amount' => '79.38'))));

       $this->assertEquals(json_decode($json_message, True), $message->to_hash());
     }
  }

?>
