<?php 
class ModelExtensionPaymentBtcLightning extends Model {
  	public function getMethod($address, $total) {
		$this->load->language('extension/payment/btc_lightning');
		

		$json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
		$obj = json_decode($json);
		$btc_percent_change_24h = abs($obj[0]->percent_change_24h);
		$percent_change_7d = abs($obj[0]->percent_change_7d);
		$btc_price = $obj[0]->price_usd;

		if($this->config->get('payment_btc_lightning_status') == true) {
			$status = true;
		}


    	$connection = @fsockopen($this->config->get('payment_btc_lightning_node_ip'), $this->config->get('payment_btc_lightning_node_port'));
	    if (is_resource($connection)){
	        fclose($connection);
	    }
	    else{
	     $status = false;
	 	}

		if (($total / (int)$btc_price) > 0.043) {
			$status = false;
		}

		if($this->config->get('payment_btc_lightning_price_change_amount') != null && $this->config->get('payment_btc_lightning_price_change_amount') != 0){
			if($btc_percent_change_24h > $this->config->get('payment_btc_lightning_price_change_amount') || $percent_change_7d > $this->config->get('payment_btc_lightning_price_change_amount')){
				$status = false;
			}
		}elseif ($this->config->get('payment_btc_lightning_total') > 0 && $this->config->get('payment_btc_lightning_total') > $total) {
			$status = false;
		}
		
		$method_data = array();
	
		if ($status) {  
      		$method_data = array( 
        		'code'       => 'btc_lightning',
        		'title'      => $this->language->get('text_title'),
				'sort_order' => $this->config->get('payment_btc_lightning_sort_order'),
				'terms' => '',
      		);
    	}
   
    	return $method_data;
  	}
}
?>