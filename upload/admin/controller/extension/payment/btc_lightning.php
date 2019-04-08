<?php 
class ControllerExtensionPaymentBtcLightning extends Controller {
	private $error = array(); 

	public function index() {
		$this->load->language('extension/payment/btc_lightning');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_btc_lightning', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['test_mode'] = $this->language->get('test_mode');
		$data['text_edit'] = $this->language->get('text_edit');
		
		$data['entry_lightning_node_ip'] = $this->language->get('entry_lightning_node_ip');
		$data['entry_lightning_node_port'] = $this->language->get('entry_lightning_node_port');
		$data['entry_lightning_node_invoice_macaroon_hex'] = $this->language->get('entry_lightning_node_invoice_macaroon_hex');
		$data['entry_lightning_node_pubkey'] = $this->language->get('entry_lightning_node_pubkey');
		//$data['entry_timezone'] = $this->language->get('entry_timezone');
		$data['entry_price_change_amount'] = $this->language->get('entry_price_change_amount');
		$data['entry_disable_price_change'] = $this->language->get('entry_disable_price_change');
		$data['entry_total'] = $this->language->get('entry_total');	
		$data['entry_add_percent'] = $this->language->get('entry_add_percent');	
		$data['entry_order_status'] = $this->language->get('entry_order_status');			
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$data['help_lightning_node_ip'] = $this->language->get('help_lightning_node_ip');
		$data['help_lightning_node_port'] = $this->language->get('help_lightning_node_port');
		$data['help_lightning_node_pubkey'] = $this->language->get('help_lightning_node_pubkey');
		$data['help_lightning_node_invoice_macaroon_hex'] = $this->language->get('help_lightning_node_invoice_macaroon_hex');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['error_ip'])) {
			$data['error_ip'] = $this->error['error_ip'];
		} else {
			$data['error_ip'] = '';
		}
		if (isset($this->error['error_port'])) {
			$data['error_port'] = $this->error['error_port'];
		} else {
			$data['error_port'] = '';
		}
		if (isset($this->error['error_pubkey'])) {
			$data['error_pubkey'] = $this->error['error_pubkey'];
		} else {
			$data['error_pubkey'] = '';
		}
		if (isset($this->error['error_invoice_macaroon_hex'])) {
			$data['error_invoice_macaroon_hex'] = $this->error['error_invoice_macaroon_hex'];
		} else {
			$data['error_invoice_macaroon_hex'] = '';
		}
		
		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();

  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
   		);

   		$data['breadcrumbs'][] = array(
       		'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
   		);

   		$data['breadcrumbs'][] = array(
       		'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/btc_lightning', 'user_token=' . $this->session->data['user_token'], true),
   		);
				
		$data['action'] = $this->url->link('extension/payment/btc_lightning', 'user_token=' . $this->session->data['user_token'], true);
		
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		$this->load->model('localisation/language');

		if (isset($this->request->post['payment_btc_lightning_node_ip'])) {
			$data['payment_btc_lightning_node_ip'] = $this->request->post['payment_btc_lightning_node_ip'];
		} else {
			$data['payment_btc_lightning_node_ip'] = $this->config->get('payment_btc_lightning_node_ip'); 
		} 	

		if (isset($this->request->post['payment_btc_lightning_node_port'])) {
			$data['payment_btc_lightning_node_port'] = $this->request->post['payment_btc_lightning_node_port'];
		} else {
			$data['payment_btc_lightning_node_port'] = $this->config->get('payment_btc_lightning_node_port'); 
		} 	


		if (isset($this->request->post['payment_btc_lightning_invoice_macaroon_hex'])) {
			$data['payment_btc_lightning_invoice_macaroon_hex'] = $this->request->post['payment_btc_lightning_invoice_macaroon_hex'];
		} else {
			$data['payment_btc_lightning_invoice_macaroon_hex'] = $this->config->get('payment_btc_lightning_invoice_macaroon_hex'); 
		} 	

		if (isset($this->request->post['payment_btc_lightning_node_pubkey'])) {
			$data['payment_btc_lightning_node_pubkey'] = $this->request->post['payment_btc_lightning_node_pubkey'];
		} else {
			$data['payment_btc_lightning_node_pubkey'] = $this->config->get('payment_btc_lightning_node_pubkey'); 
		} 	
		
		$data['languages'] = $languages;
		
		if (isset($this->request->post['payment_btc_lightning_total'])) {
			$data['payment_btc_lightning_total'] = $this->request->post['payment_btc_lightning_total'];
		} else {
			$data['payment_btc_lightning_total'] = $this->config->get('payment_btc_lightning_total'); 
		} 

		if (isset($this->request->post['payment_btc_lightning_add_percent'])) {
			$data['payment_btc_lightning_add_percent'] = $this->request->post['payment_btc_lightning_add_percent'];
		} else {
			$data['payment_btc_lightning_add_percent'] = $this->config->get('payment_btc_lightning_add_percent'); 
		} 
				
		if (isset($this->request->post['payment_btc_lightning_order_status_id'])) {
			$data['payment_btc_lightning_order_status_id'] = $this->request->post['payment_btc_lightning_order_status_id'];
		} else {
			$data['payment_btc_lightning_order_status_id'] = $this->config->get('payment_btc_lightning_order_status_id'); 
		}

		/*if (isset($this->request->post['payment_btc_lightning_timezone'])) {
			$data['payment_btc_lightning_timezone'] = $this->request->post['payment_btc_lightning_timezone'];
		} else {
			$data['payment_btc_lightning_timezone'] = $this->config->get('payment_btc_lightning_timezone'); 
		} 		*/ 

		if (isset($this->request->post['payment_btc_lightning_price_change_amount'])) {
			$data['payment_btc_lightning_price_change_amount'] = $this->request->post['payment_btc_lightning_price_change_amount'];
		} else {
			$data['payment_btc_lightning_price_change_amount'] = $this->config->get('payment_btc_lightning_price_change_amount'); 
		} 

		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['payment_btc_lightning_status'])) {
			$data['payment_btc_lightning_status'] = $this->request->post['payment_btc_lightning_status'];
		} else {
			$data['payment_btc_lightning_status'] = $this->config->get('payment_btc_lightning_status');
		}
		
		if (isset($this->request->post['payment_btc_lightning_sort_order'])) {
			$data['payment_btc_lightning_sort_order'] = $this->request->post['payment_btc_lightning_sort_order'];
		} else {
			$data['payment_btc_lightning_sort_order'] = $this->config->get('payment_btc_lightning_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/btc_lightning', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/btc_lightning')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('localisation/language');

		if (!$this->request->post['payment_btc_lightning_node_ip']) {
			$this->error['error_ip'] = $this->language->get('error_ip');
		}
		if (!$this->request->post['payment_btc_lightning_node_port']) {
			$this->error['error_port'] = $this->language->get('error_port');
		}
		if (!$this->request->post['payment_btc_lightning_node_pubkey']) {
			$this->error['error_pubkey'] = $this->language->get('error_pubkey');
		}
		if (!$this->request->post['payment_btc_lightning_invoice_macaroon_hex']) {
			$this->error['error_invoice_macaroon_hex'] = $this->language->get('error_invoice_macaroon_hex');
		}
		if (preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $this->request->post['payment_btc_lightning_node_ip'] != 1)) {
			$this->error['error_ip'] = $this->language->get('error_ip_wrong');
		}			


		return !$this->error;
	}
}
?>