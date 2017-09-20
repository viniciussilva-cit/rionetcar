<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

/* Inicia a valida��o e grava��o das informa��es no banco de dados. */
if(isset($_GET["id"])){
	$id = strip_tags($_GET["id"]);
}

if(!empty($id)){ //Edi��o de informa��o
	if(is_post()){
	
		$table = new Table('magazine_category', $_POST);
		
		$up_array = array(
			'name', 'status', 'ordination'
		);
		
		/* Antes de gravado � verificado se j� existe o numero de ordena��o. */
		$sql = "select * from magazine_category where ordination = " . $table->ordination . " and id <> " . $id;
		$rs = mysql_query($sql);
		$rows = mysql_num_rows($rs);
		
		if($rows >= 1)
		{
			$msg = utf8_encode("Ordem de exibi��o j� est� sendo utilizado.");
			Session::Set('notice', $msg);
			
			/* Dados s�o novamente carregados no formul�rio. */
			$magazine_category = Table::Fetch('magazine_category', $id);
		}else{
			/* Caso tenha gravado � informado ao usu�rio. */
			$flag = $table->update($up_array);
			
			if($flag){
				Session::Set('notice', 'Categoria atualizada com sucesso.');
				redirect( WEB_ROOT . "/vipmin/magazine/index-category.php");
			}
		}		
	}else{
		/* Busca as informa��e do artigo de acordo com a ID. */
		$magazine_category = Table::Fetch('magazine_category', $id);
	}
}
else{ // Inserir novas informa��es
	if(is_post()){
	
		$table = new Table('magazine_category', $_POST);
		
		$up_array = array(
			'name', 'status', 'ordination'
		);
		
		/* Antes de gravado � verificado se j� existe o numero de ordena��o. */
		$sql = "select * from magazine_category where ordination = " . $table->ordination;
		$rs = mysql_query($sql);
		$rows = mysql_num_rows($rs);
		
		if($rows >= 1)
		{
			$msg = utf8_encode("Ordem de exibi��o j� est� sendo utilizado.");
			Session::Set('notice', $msg);
		}else{
			/* Caso tenha gravado � informado ao usu�rio. */
			$flag = $table->insert($up_array);
			
			if($flag){
				Session::Set('notice', 'Nova categoria cadastrada com sucesso.');
				redirect( WEB_ROOT . "/vipmin/magazine/index-category.php");
			}
		}
	}
}

/* Carrega a template. */
include template('manage_magazine_edit-category');

?>
