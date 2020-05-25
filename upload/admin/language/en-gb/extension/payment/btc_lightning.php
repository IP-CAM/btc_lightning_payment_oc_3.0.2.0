<?php
// Heading
$_['heading_title']      = 'Bitcoin ⚡ Lightning Network ⚡';

// Text 
$_['text_payment']       = 'Payment';
$_['text_success']       = 'Module configuration is updated!';
$_['text_edit']          = 'Edit Bitcoin ⚡ Lightning Network ⚡'; 

// Entry
$_['entry_lightning_node_ip']       = 'LN Node IP:';
$_['entry_lightning_node_port']       = 'LN Node Rest API port:';
$_['entry_lightning_node_invoice_macaroon_hex']       = 'Invoice Macaroon Hex:';
$_['entry_lightning_node_pubkey']       = 'Pubkey@IpAddress:Port';

$_['entry_total']        = 'Minimum order amount. Below this amount payment method will not be available.';
$_['entry_add_percent']        = 'Additional fee % for this payment method';
$_['entry_order_status'] = 'Order status:';
$_['entry_status']       = 'Status:';
$_['entry_sort_order']   = 'Order:';


$_['help_lightning_node_ip']   = 'Lightning Node IP Address';
$_['help_lightning_node_port']   = 'Lightning Node REST API port';
$_['help_lightning_node_pubkey']   = 'Lightning Node Pubkey with ip address and port';
$_['help_lightning_node_invoice_macaroon_hex']   = 'invoice.macaroon hex. <br> console: xxd -ps -u -c 1000  $HOME/.lnd/data/chain/bitcoin/mainnet/invoice.macaroon ';

// Error
$_['error_permission']   = 'You haven`t rights to change module config!';
$_['error_ip']         = 'Please write LN IP address!';
$_['error_port']         = 'Please write LN Port!';
$_['error_pubkey']         = 'Please write LN Pubkey!';
$_['error_invoice_macaroon_hex']         = 'Please write invoice.macaroon hex!';
$_['error_ip_wrong']   = 'Wrong IP address format!';
$_['test_mode'] = '<b>Remember that Bitcoin Lightning Network is now in testing/development mode. You can lost your BTC.</b>'; 
?>