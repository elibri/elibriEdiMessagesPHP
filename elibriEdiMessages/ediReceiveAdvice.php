<?php

  class EdiReceiveAdvice {

    private $kind = "RECADV";
    public $order_id;
    public $buyer_number;
    public $despatch_advice_id;

    public $line_items = array();

    function __construct($arr = array()) {
      if (isset($arr['order_id'])) {
         $this->order_id = $arr['order_id'];
      }

      if (isset($arr['buyer_number'])) {
         $this->buyer_number = $arr['buyer_number'];
      }

      if (isset($arr['despatch_advice_id'])) {
         $this->despatch_advice_id = $arr['despatch_advice_id'];
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

      if ($this->buyer_number) { $hash['buyer_number'] = $this->buyer_number; }

      if ($this->despatch_advice_id) { $hash['despatch_advice_id'] = $this->despatch_advice_id; }
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
