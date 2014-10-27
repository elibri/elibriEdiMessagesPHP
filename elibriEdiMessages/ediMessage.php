<?php

  class EdiMessage {
    
     public static function parse($json_message) {
       $json = json_decode($json_message, True);
       if ($json['kind'] == "ORDER") {
         $message = new EdiOrder($json);
       } else if ($json['kind'] == "ORDRSP") {
         $message = new EdiOrderResponse($json);
       } else if ($json['kind'] == "RECADV") {
         $message = new EdiReceiveAdvice($json);
       } else if ($json['kind'] == "INVOICE") {
         $message = new EdiInvoice($json);
       } else if ($json['kind'] == "DESADV") {
         $message = new EdiDespatchAdvice($json);
       } else {
         throw new Exception("Invalid message kind: ${json['kind']}");
       }
       return $message;
     }



  }

?>
