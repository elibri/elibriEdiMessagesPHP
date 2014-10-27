<?php

  class EdiLineItem {

    public $quantity;
    public $net_price;
    public $net_amount;
    public $tax_rate;
    public $tax_amount;
    public $ean;
    public $buyer_code;
    public $description;
    public $position;


    function __construct($arr) {
      $this->quantity = $arr['quantity'];

      if (isset($arr['net_price'])) {
        $this->net_price = $arr['net_price'];
      }

      if (isset($arr['net_amount'])) {
        $this->net_amount = $arr['net_amount'];
      }

      if (isset($arr['tax_rate'])) {
        $this->tax_rate = $arr['tax_rate'];
      }

      if (isset($arr['tax_amount'])) {
        $this->tax_amount = $arr['tax_amount'];
      }

      if (isset($arr['ean'])) {
        $this->ean = $arr['ean'];
      }

      if (isset($arr['buyer_code'])) {
        $this->buyer_code = $arr['buyer_code'];
      }

      if (isset($arr['description'])) {
        $this->description = $arr['description'];
      }

      if (isset($arr['position'])) {
        $this->position = $arr['position'];
      }
    }

    function to_hash() {
      $hash = array();

      $hash['quantity'] = $this->quantity;

      if ($this->net_price) {
        $hash['net_price'] = $this->net_price;
      }

      if ($this->net_amount) {
        $hash['net_amount'] = $this->net_amount;
      }

      if ($this->tax_rate) {
        $hash['tax_rate'] = $this->tax_rate;
      }

      if ($this->tax_amount) {
        $hash['tax_amount'] = $this->tax_amount;
      }

      if ($this->ean) {
        $hash['ean'] = $this->ean;
      }

      if ($this->buyer_code) {
        $hash['buyer_code'] = $this->buyer_code;
      }

      if ($this->description) {
        $hash['description'] = $this->description;
      }

      if ($this->position) {
        $hash['position'] = $this->position;
      }

      return $hash;

    }
  }

?>
