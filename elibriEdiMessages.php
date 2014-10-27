<?php
  //ustaw domyślną strefę czasową
  if (!ini_get("date.timezone")) {
    date_default_timezone_set("Europe/Warsaw");
  }
  require_once 'elibriEdiMessages/ediMessage.php';
  require_once 'elibriEdiMessages/ediOrder.php';
  require_once 'elibriEdiMessages/ediDespatchAdvice.php';
  require_once 'elibriEdiMessages/ediInvoice.php';
  require_once 'elibriEdiMessages/ediOrderResponse.php';
  require_once 'elibriEdiMessages/ediReceiveAdvice.php';
  require_once 'elibriEdiMessages/ediLineItem.php';
  require_once 'elibriEdiMessages/ediInvoiceSummary.php';
  require_once 'elibriEdiMessages/ediInvoiceSummaryLine.php';

//?>
