<?php

  class EdiInvoiceSummaryLine {

    public $tax_rate;
    public $net_amount;
    public $tax_amount;
    public $gross_amount;

    function __construct($arr) {
      $this->tax_rate = $arr['tax_rate'];
      $this->net_amount = $arr['net_amount'];
      $this->tax_amount = $arr['tax_amount'];
      $this->gross_amount = $arr['gross_amount'];
    }

    function to_hash() {
      $hash = array();

      $hash['tax_rate'] = $this->tax_rate;
      $hash['net_amount'] = $this->net_amount;
      $hash['tax_amount'] = $this->tax_amount;
      $hash['gross_amount'] = $this->gross_amount;

      return $hash;

    }
  }

?>
