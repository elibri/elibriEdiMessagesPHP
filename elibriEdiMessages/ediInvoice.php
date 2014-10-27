<?php

  class EdiInvoice {

    private $kind = "INVOICE";
    public $invoice_number;
    public $document_type;
    public $seller_id;
    public $buyer_id;
    public $delivery_detail_id;
    public $order_id;
    public $order_buyer_number;
    public $invoice_date;
    public $sales_date;
    public $payment_due_date;
    public $seller_name;
    public $seller_address;
    public $seller_city;
    public $seller_post_code;
    public $seller_tax_id;
    public $buyer_name;
    public $buyer_address;
    public $buyer_city;
    public $buyer_post_code;
    public $buyer_tax_id;
    public $delivery_detail_name;
    public $delivery_detail_address;
    public $delivery_detail_city;
    public $delivery_detail_post_code;
    public $pdf;
    public $summary;

    public $line_items = array();

    function __construct($arr = array()) {
      if (isset($arr['invoice_number'])) {
         $this->invoice_number = $arr['invoice_number'];
      }

      if (isset($arr['document_type'])) {
         $this->document_type = $arr['document_type'];
      }

      if (isset($arr['seller_id'])) {
         $this->seller_id = $arr['seller_id'];
      }

      if (isset($arr['buyer_id'])) {
         $this->buyer_id = $arr['buyer_id'];
      }

      if (isset($arr['delivery_detail_id'])) {
         $this->delivery_detail_id = $arr['delivery_detail_id'];
      }

      if (isset($arr['order_id'])) {
         $this->order_id = $arr['order_id'];
      }

      if (isset($arr['order_buyer_number'])) {
         $this->order_buyer_number = $arr['order_buyer_number'];
      }

      if (isset($arr['invoice_date'])) {
         $this->invoice_date = $arr['invoice_date'];
      }

      if (isset($arr['sales_date'])) {
         $this->sales_date = $arr['sales_date'];
      }

      if (isset($arr['payment_due_date'])) {
         $this->payment_due_date = $arr['payment_due_date'];
      }

      if (isset($arr['seller_name'])) {
         $this->seller_name = $arr['seller_name'];
      }

      if (isset($arr['seller_address'])) {
         $this->seller_address = $arr['seller_address'];
      }

      if (isset($arr['seller_city'])) {
         $this->seller_city = $arr['seller_city'];
      }

      if (isset($arr['seller_post_code'])) {
         $this->seller_post_code = $arr['seller_post_code'];
      }

      if (isset($arr['seller_tax_id'])) {
         $this->seller_tax_id = $arr['seller_tax_id'];
      }

      if (isset($arr['buyer_name'])) {
         $this->buyer_name = $arr['buyer_name'];
      }

      if (isset($arr['buyer_address'])) {
         $this->buyer_address = $arr['buyer_address'];
      }

      if (isset($arr['buyer_city'])) {
         $this->buyer_city = $arr['buyer_city'];
      }

      if (isset($arr['buyer_post_code'])) {
         $this->buyer_post_code = $arr['buyer_post_code'];
      }

      if (isset($arr['buyer_tax_id'])) {
         $this->buyer_tax_id = $arr['buyer_tax_id'];
      }

      if (isset($arr['delivery_detail_name'])) {
         $this->delivery_detail_name = $arr['delivery_detail_name'];
      }

      if (isset($arr['delivery_detail_address'])) {
         $this->delivery_detail_address = $arr['delivery_detail_address'];
      }

      if (isset($arr['delivery_detail_city'])) {
         $this->delivery_detail_city = $arr['delivery_detail_city'];
      }

      if (isset($arr['delivery_detail_post_code'])) {
         $this->delivery_detail_post_code = $arr['delivery_detail_post_code'];
      }

      if (isset($arr['pdf'])) {
         $this->pdf = $arr['pdf'];
      }

      if (isset($arr['summary'])) { $this->summary = new EdiInvoiceSummary($arr['summary']); }
      if (isset($arr['items'])) {
        for ($i = 0; $i < count($arr['items']); ++$i) {
          $this->line_items[] = new EdiLineItem($arr['items'][$i]);
        }
      }
    }

    function to_hash() {
      $hash = array();
      if ($this->kind) { $hash['kind'] = $this->kind; }

      if ($this->invoice_number) { $hash['invoice_number'] = $this->invoice_number; }

      if ($this->document_type) { $hash['document_type'] = $this->document_type; }

      if ($this->seller_id) { $hash['seller_id'] = $this->seller_id; }

      if ($this->buyer_id) { $hash['buyer_id'] = $this->buyer_id; }

      if ($this->delivery_detail_id) { $hash['delivery_detail_id'] = $this->delivery_detail_id; }

      if ($this->order_id) { $hash['order_id'] = $this->order_id; }

      if ($this->order_buyer_number) { $hash['order_buyer_number'] = $this->order_buyer_number; }

      if ($this->invoice_date) { $hash['invoice_date'] = $this->invoice_date; }

      if ($this->sales_date) { $hash['sales_date'] = $this->sales_date; }

      if ($this->payment_due_date) { $hash['payment_due_date'] = $this->payment_due_date; }

      if ($this->seller_name) { $hash['seller_name'] = $this->seller_name; }

      if ($this->seller_address) { $hash['seller_address'] = $this->seller_address; }

      if ($this->seller_city) { $hash['seller_city'] = $this->seller_city; }

      if ($this->seller_post_code) { $hash['seller_post_code'] = $this->seller_post_code; }

      if ($this->seller_tax_id) { $hash['seller_tax_id'] = $this->seller_tax_id; }

      if ($this->buyer_name) { $hash['buyer_name'] = $this->buyer_name; }

      if ($this->buyer_address) { $hash['buyer_address'] = $this->buyer_address; }

      if ($this->buyer_city) { $hash['buyer_city'] = $this->buyer_city; }

      if ($this->buyer_post_code) { $hash['buyer_post_code'] = $this->buyer_post_code; }

      if ($this->buyer_tax_id) { $hash['buyer_tax_id'] = $this->buyer_tax_id; }

      if ($this->delivery_detail_name) { $hash['delivery_detail_name'] = $this->delivery_detail_name; }

      if ($this->delivery_detail_address) { $hash['delivery_detail_address'] = $this->delivery_detail_address; }

      if ($this->delivery_detail_city) { $hash['delivery_detail_city'] = $this->delivery_detail_city; }

      if ($this->delivery_detail_post_code) { $hash['delivery_detail_post_code'] = $this->delivery_detail_post_code; }

      if ($this->pdf) { $hash['pdf'] = $this->pdf; }
      if ($this->line_items) {
        $hash['items'] = array();
        for ($i = 0; $i < count($this->line_items); ++$i) {
          $hash['items'][] = $this->line_items[$i]->to_hash();
        }
      }
      if ($this->summary) { $hash['summary'] = $this->summary->to_hash(); }
      return $hash;
    }

    function to_json() {
      return json_encode($this->to_hash());
    }
  }

?>
