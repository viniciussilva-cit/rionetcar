 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
 <div style="clear:both;">  *An�ncio sujeito a altera��o sem pr�vio aviso, consulte o anunciante.</div> 
 <div class="AvisoIrregularidade"><a href="#" class="tk_denuncia cboxElement">Irregularidade nesse an�ncio?</a></div>
 <div class="carro-detalhe" style="clear:both;">
	 <div class="span-16 raio-5 last avaliacao fundobranco"> 
		<div class="titulocc borda-bottom-1 padding-bottom-10">   
			<div class="span-8 borda-bottom-1 fundosecao" style="width:615px;">
				<div class="alturasecao" style="margin-top:-10px;"> 
						<div class="titfipe">Caracter�sticas do ve�culo</div> 
						<? if($team['temprecoespecial']=="Y"){
						if((gettipoanunciante($login_user[id])!="" and gettipoanunciante($login_user[id])!="Particular")  or $login_user[id] ==1){
						?>
							<div style="float: right;margin-right: 33px;margin-top: -6.7%;color: #FFFFFF;font-weight: bold;font-size: 15px;">Pre�o especial para revendas: <a class="linknew" href='javascript:preco_especial_revenda("<?=$team['id']?>");'>Clique aqui</a> </div>
						<? } 
					}?>
				</div>
			</div>
			
			<div class="jump-1 margin-top-10" style="margin-bottom:21px;">
				<div style="float:left;width:325px;">
					<span class="span-4 size-12">Fabrica��o:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['car_ano'])?></span>
				</div>
				<div  style="height:21px;">
					<span class="span-4 size-12">Modelo:</span><span class="span-3 last size-13-bold caracdir2"> <?=utf8_decode($team['modelo_ano'])?></span>
				</div>
				<div style="margin-top: 4px;float:left;width:325px;">
					<span class="span-4 size-12">Portas:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['numero_portas'])?></span>
				</div>
				 
				<div style="margin-top: 4px;">
				<span class="span-4 size-12">Cilindros:</span><span class="span-3 last size-13-bold caracdir2">  <?=utf8_decode($team['cilindros'])?></span>
				</div>
				 
				<div style="margin-top: 8px;float:left;width:325px;height:21px;">
					<span class="span-4 size-12">Motor:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['motor'])?></span>
				</div>
				 
				<div  style="margin-top: 8px;height:21px;">
					<span class="span-4 size-12">Km:</span><span class="span-3 last size-13-bold caracdir2"> <?=utf8_decode($team['km'])?></span>
				</div>
				<div style="margin-top: 4px;float:left;width:325px;">
					<span class="span-4 size-12">Cor:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['cor'])?></span>
				</div>
				<div style="margin-top: 4px;">
					<span class="span-4 size-12">C�mbio:</span><span class="span-3 last size-13-bold caracdir2"> <?=utf8_decode($team['transmissao'])?></span>
				</div>
				<div style="margin-top: 10px;float:left;width:325px;height:21px;">
					<span class="span-4 size-12">Combust�vel:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['combustivel'])?></span>
				</div>
				<div style="margin-top: 10px;">
					<span class="span-4 size-12">Placa:</span><span class="span-3 last size-13-bold caracdir2"> <?=formataplaca($team['placa'])?></span>
				</div> 
				<!--
				<div  style="height:21px;">
					<span class="span-4 size-12">Tra��o:</span><span class="span-3 last size-13-bold"> <?=utf8_decode($team['tracao'])?></span>
				</div>
				-->
				<div style="margin-top: 8px;float:left;width:325px;height:21px;">
					<span class="span-4 size-12">Tipo:</span><span class="span-3 last size-13-bold caracdir"><?=utf8_decode($team['estadoveiculo'])?></span>
				</div>
				<div style="margin-top: 8px;">
					<span class="span-4 size-12">Anunciante:</span><span class="span-3 last size-13-bold caracdir2"> <?=gettipoanunciante($team[partner_id])?></span>
				</div> 		
			</div>
		  </div>
	 	<div class="tfipetxt">   </div>
	 </div>
 </div> 
 <div style="display:none;">
	<!-- DIV PARA DENUNCIAR IRREGULARIDADES -->
	<div id='inline_denuncia' style='background:#fff; height:110px; padding:10px; width:145px !important'>
		<div>
			<p class="DenunciaTitle"><img src="<?php echo $PATHSKIN; ?>/images/atention.png" alt="Irregularidade no an�ncio" title="Irregularidade no an�ncio"> Informe alguma irregularidade no an�ncio.</p>
			<p>Favor entrar em contato conosco atrav�s do e-mail <a class="EmailDenuncia" href="mailto:<?php echo $INI['mail']['helpemail']?>"><?php echo $INI['mail']['helpemail']?></a>, com o assunto: Irregularidade no an�ncio: C�d. An�ncio - <?=$team['id']?></p>
		</div>
	</div>  
</div>
<script>
function preco_especial_revenda(team_id){
 
	J.ajax({
	   type: "POST",
	   cache: false,
	   async: false,
	   url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
	   data: "acao=preco_especial_revenda&team_id="+team_id, 
	   success: function(retorno){ 
			 jQuery.colorbox({html:retorno});  	 
		}
	});
}

J(".tk_denuncia").colorbox({inline:true, href:"#inline_denuncia",width:"700px",height:"200px"}); 
</script>
	