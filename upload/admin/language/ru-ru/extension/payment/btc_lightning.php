<?php
// Heading
$_['heading_title']      = 'Оплата Биткоином - ⚡ Lightning Network ⚡';

// Text 
$_['text_payment']       = 'Оплата';
$_['text_success']       = 'Настройки модуля обновлены!';
$_['text_edit']          = 'Редактировать Bitcoin ⚡ Lightning Network ⚡'; 

// Entry
$_['entry_lightning_node_ip']       = 'LN Node IP:';
$_['entry_lightning_node_port']       = 'LN Node Rest API порт:';
$_['entry_lightning_node_invoice_macaroon_hex']       = 'Invoice Macaroon Hex:';
$_['entry_lightning_node_pubkey']       = 'Pubkey@IpAddress:Port';
//$_['entry_timezone']       = 'Время магазина:';
$_['entry_total']        = 'Минимальная сумма:<br /><span class="help">Минимальная сумма заказа. Ниже этой суммы метод будет недоступен.</span>';
$_['entry_add_percent']        = 'Наценка % на этот метод оплаты';
$_['entry_price_change_amount']        = 'Отключить метод при изменении курса валюты > n%';
$_['entry_order_status'] = 'Статус заказа:';
$_['entry_status']       = 'Статус:';
$_['entry_sort_order']   = 'Порядок сортировки:';

$_['help_lightning_node_ip']   = 'Lightning Node IP адрес';
$_['help_lightning_node_port']   = 'Lightning Node REST API порт';
$_['help_lightning_node_pubkey']   = 'Lightning Node Pubkey с ip адресом и портом';
$_['help_lightning_node_invoice_macaroon_hex']   = 'invoice.macaroon hex. <br> console: xxd -ps -u -c 1000  $HOME/.lnd/data/chain/bitcoin/mainnet/invoice.macaroon ';


$_['error_port']         = 'Пожалуйста напишите порт вашей ноды!';
$_['error_pubkey']         = 'Пожалуйста напишите Pubkey!';
$_['error_invoice_macaroon_hex']         = 'Заполните поле с invoice.macaroon hex!';
$_['error_permission']   = 'У Вас нет прав для управления этим модулем!';
$_['error_ip']         = 'Укажите IP адрес LN ноды!';
$_['error_ip_wrong']   = 'Неверный формат IP адреса!';
$_['test_mode'] = 'Помните,  Bitcoin Lightning сеть всё ещё в режиме тестирования. Используйте с осторожностью, вы можете потерять ваши средства.'; 

?>