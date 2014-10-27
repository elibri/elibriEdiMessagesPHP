elibriEdiMessagesPHP
====================

Parse and construct eLibri Edi Messages - https://www.edi.elibri.com.pl

```
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
     
   $message->to_json();
```

More code examples in tests directory.
