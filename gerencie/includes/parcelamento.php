<? 
function parcelamentocombo($fValor, $fAno, $fEntrada, $fId){
	
	include("admin/connect.php");
	$sqlfactor= mysql_query("select item from textos where id=3") or die(mysql_error());
	$fator = mysql_fetch_array($sqlfactor);
	$f = intval($fator['item']);
	
	$fAno = intval($fAno);
	$sqlfuncao = mysql_query("select * from pagamento where ano=$fAno and fator<>0 order by prestacoes asc") or die("ERRO linha 4");	
	$fTotal = ($fValor+$f)- $fEntrada;

	if (mysql_num_rows($sqlfuncao)>0){ 
	    
		$r = "<form id='formentrada' name='formentrada' method='post' action='carro.php?id=$fId'>";
		$r.= "<p style='margin-bottom=5px;' >Entre com a entrada para simular o Parcelamento*</p>";
		$r.= "<input name='entrada' class='entrada' type='text' value='$fEntrada' size='6' maxlength='10' /><input type='submit' name='button' id='button' value='Calcular' class='calcular'/>";	
		$r.= "<br><select name='parcela' class='parcelasss' size='1' >"; 

		while($fParcelas = mysql_fetch_array($sqlfuncao)){
			$fQtd = $fParcelas['prestacoes'];
			$fFator = $fParcelas['fator'];
			$fPrestacao = ($fTotal * $fFator);
			$fPrestacao = "R$".number_format($fPrestacao ,2,',','.');
			$fEntradaTxt = "R$".number_format($fEntrada,2,',','.');

			$r .= ($fEntrada>0) ? "<option value='$fQtd' >$fEntradaTxt + ".$fQtd."x $fPrestacao </option>" : "<option value='$fQtd' >$fQtd de $fPrestacao</option>"; 
    	}
		$r .= "</select>";
		$r.= "<p>* Os valores podem sofrer altera&ccedil;&otilde;es sem aviso pr&eacute;vio.</p>";
		$r .= "</form>";
	} else {
	$r = "<p>Parcelamento N&atilde;o dispon&iacute;vel</p>";
	}

	return $r ;
}


?>