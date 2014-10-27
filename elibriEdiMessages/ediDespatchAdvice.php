<?php

  class EdiDespatchAdvice {

    private $kind = "DESADV";
    public $order_id;
    public $order_buyer_number;
    public $seller_number;

    public $line_items = array();

    function __construct($arr = array()) {
      if (isset($arr['order_id'])) {
         $this->order_id = $arr['order_id'];
      }

      if (isset($arr['order_buyer_number'])) {
         $this->order_buyer_number = $arr['order_buyer_number'];
      }

      if (isset($arr['seller_number'])) {
         $this->seller_number = $arr['seller_number'];
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

      if ($this->order_id) { $hash['order_id'] = $this->order_id; }

      if ($this->order_buyer_number) { $hash['order_buyer_number'] = $this->order_buyer_number; }

      if ($this->seller_number) { $hash['seller_number'] = $this->seller_number; }
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
