<?php
require_once(dirname(__FILE__) . '/app.php');
 
$secret =  $_GET['secret'] ;

if ($secret) { 

	$sql 	=  "select * from subscribe where secret= '".$secret."'";
	$rs 	= mysql_query($sql);
	$row 	= mysql_fetch_object($rs);

	$email 	= $row->email;
	$ativo 	= $row->ativo;
		
	
	if(!empty($email) and empty($ativo)){ // falta confirmar
	
		echo $sql =  "update subscribe set ativo = 's' where secret = '".$secret."'";
		$rs = mysql_query($sql);
		?>
		<script>
		alert("<?=utf8_encode("Confirma��o de email realizada com sucesso! Agora voc� est� pronto para receber nossas ofertas. Parab�ns !")?>")
		</script>
		<?
	}
	if(!empty($email) and  $ativo == "s"){ // confirmado
		 echo utf8_encode("N�o se preocupe, O seu email j� est� ativado.");
		 exit;
	}
	if( empty($email) and empty($ativo)){ // usuario nao encontrado
	 
		 echo utf8_encode("Me desculpe, mais n�o conseguimos encontrar o seu usu�rio.");
		 exit;
		  
	}
		
}

redirect( WEB_ROOT  . '/index.php');

 
