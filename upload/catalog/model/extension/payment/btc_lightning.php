<?php 
class ModelExtensionPaymentBtcLightning extends Model {
  	public function getMethod($address, $total) {
		$this->load->language('extension/payment/btc_lightning');

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

		if ($this->config->get('payment_btc_lightning_total') > 0 && $this->config->get('payment_btc_lightning_total') > $total) {
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