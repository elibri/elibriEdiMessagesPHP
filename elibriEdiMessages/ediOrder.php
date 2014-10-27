<?php

  class EdiOrder {

    private $kind = "ORDER";
    public $buyer_number;
    public $buyer_id;
    public $seller_id;
    public $delivery_id;
    public $order_date;
    public $requested_date;
    public $due_date;
    public $despatching_mode;
    public $invoicing_mode;

    public $line_items = array();

    function __construct($arr = array()) {
      if (isset($arr['buyer_number'])) {
         $this->buyer_number = $arr['buyer_number'];
      }

      if (isset($arr['buyer_id'])) {
         $this->buyer_id = $arr['buyer_id'];
      }

      if (isset($arr['seller_id'])) {
         $this->seller_id = $arr['seller_id'];
      }

      if (isset($arr['delivery_id'])) {
         $this->delivery_id = $arr['delivery_id'];
      }

      if (isset($arr['order_date'])) {
         $this->order_date = $arr['order_date'];
      }

      if (isset($arr['requested_date'])) {
         $this->requested_date = $arr['requested_date'];
      }

      if (isset($arr['due_date'])) {
         $this->due_date = $arr['due_date'];
      }

      if (isset($arr['despatching_mode'])) {
         $this->despatching_mode = $arr['despatching_mode'];
      }

      if (isset($arr['invoicing_mode'])) {
         $this->invoicing_mode = $arr['invoicing_mode'];
      }
      if (isset($arr['line_items'])) {
        for ($i = 0; $i < count($arr['line_items']); ++$i) {
          $this->line_items[] = new EdiLineItem($arr['line_items'][$i]);
        }
      }
    }

    function to_hash() {
      $hash = array();
      if ($this->kind) { $hash['kind'] = $this->kind; }

      if ($this->buyer_number) { $hash['buyer_number'] = $this->buyer_number; }

      if ($this->buyer_id) { $hash['buyer_id'] = $this->buyer_id; }

      if ($this->seller_id) { $hash['seller_id'] = $this->seller_id; }

      if ($this->delivery_id) { $hash['delivery_id'] = $this->delivery_id; }

      if ($this->order_date) { $hash['order_date'] = $this->order_date; }

      if ($this->requested_date) { $hash['requested_date'] = $this->requested_date; }

      if ($this->due_date) { $hash['due_date'] = $this->due_date; }

      if ($this->despatching_mode) { $hash['despatching_mode'] = $this->despatching_mode; }

      if ($this->invoicing_mode) { $hash['invoicing_mode'] = $this->invoicing_mode; }
      if ($this->line_items) {
        $hash['line_items'] = array();
        for ($i = 0; $i < count($this->line_items); ++$i) {
          $hash['line_items'][] = $this->line_items[$i]->to_hash();
        }
      }
      return $hash;
    }

    function to_json() {
      json_encode($this->to_hash());
    }
  }

?>
