<?php  
require_once(dirname(dirname(__FILE__)) . '/app.php');
require_once(dirname(dirname(__FILE__)) . '/util/Util.php');
   
if ( $_POST ) { 
		 
    $team = Table::Fetch('team', $_POST['team_id']);
		 
	$sql	="INSERT INTO `ask` (`user_id`, `team_id`, `city_id`, `type`, `comment`, `content`, `create_time`,`aprovado` ) VALUES (".$login_user_id.", '".$_POST['team_id']."','".$_POST['city_id']."', 'ask', '', '".htmlspecialchars($_POST['content'])."', Now(),'N')";
	$rs 	=  mysql_query($sql);
	if(!$rs){
		$error =  "N�o foi poss�vel cadastrar o seu coment�rio. Tente novamente mais tarde.";	 
		$msqerro = mysql_error(); 
		echo $error . " - ".$msqerro;
	}
	
	echo "====".print_r($login_user);
	
	$body = 
	"<h2>Coment�rio de Oferta Aguardando Modera��o</h2><br>
	 <h3> Dados do Coment�rio</h3>
	
	<p>Oferta: ".$team['title']."</p>
	<p>Nome: ".$login_user['name']."</p>
	<p>Email: ".$login_user['email']."</p>";
	
	if($_POST['tel']){
		$body.= "<p>Telefone: ".$login_user['tel']."</p>";
	}
	 
	$body.= "<h3> Coment�rio</h3>
	<p>".htmlspecialchars($_REQUEST["content"])."</p>" ;

	if(enviar( $INI['mail']['user'],"[Coment�rio de Oferta Aguardando Modera��o]",$body)){
		  $enviou =  true;
	}
 	
}



 