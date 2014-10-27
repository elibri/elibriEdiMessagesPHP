<?php

  class EdiInvoiceSummary {

    public $total_lines;
    public $net_amount;
    public $tax_amount;
    public $gross_amount;
    public $items_count;
    public $tax_rate_summaries;

    function __construct($arr) {
      $this->total_lines = $arr['total_lines'];
      $this->net_amount = $arr['net_amount'];
      $this->tax_amount = $arr['tax_amount'];
      $this->gross_amount = $arr['gross_amount'];
      $this->items_count = $arr['items_count'];
      $this->tax_rate_summaries = array();
      for ($i = 0; $i < count($arr['tax_rate_summaries']); ++$i) {
        $this->tax_rate_summaries[] = new EdiInvoiceSummaryLine($arr['tax_rate_summaries'][$i]);
      }
    }

    function to_hash() {
      $hash = array();

      $hash['total_lines'] = $this->total_lines;
      $hash['net_amount'] = $this->net_amount;
      $hash['tax_amount'] = $this->tax_amount;
      $hash['gross_amount'] = $this->gross_amount;
      $hash['items_count'] = $this->items_count;
      $hash['tax_rate_summaries'] = array();
      for ($i = 0; $i < count($this->tax_rate_summaries); ++$i) {
        $hash['tax_rate_summaries'][] = $this->tax_rate_summaries[$i]->to_hash();
      }

      return $hash;

    }
  }

?>
