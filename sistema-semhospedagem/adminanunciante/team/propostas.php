<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
 
need_anunciante(); 
 
$now = time();

if($_SESSION['user_id']){
	$codigoparceiro = $_SESSION['user_id'];	
}
else if($_SESSION['user_id']){
	$codigoparceiro = $_SESSION['user_id'];	
}
else {
		echo " C�digo de parceiro inv�lido. Por favor, fa�a um novo login";
		exit;
}

$condition[] = "user_id = ".$codigoparceiro;
 
/* filter end */ 
$count = Table::Count('propostas', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$propostas = DB::LimitQuery('propostas', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
 
$selector = 'index';
include template('manage_team_propostas_anunciante');


