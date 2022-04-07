<?

function GERA_IMAGEM($IMAGEM,$NOME,$DESTINO,$NOVO_NOME,$V1,$V2,$DIRECAO) {

if ($NOME !="") { 
	$img=getimagesize($IMAGEM);
	$altura = $img[1];
	$largura = $img[0];
	if ($DIRECAO=="s"){
		if ( $largura> $altura) {
			$LARGURA_NOVA = $V1;
			$ALTURA_NOVA = $V2;
		} else {
			$LARGURA_NOVA = $V2;
			$ALTURA_NOVA = $V1;
		}
	} else {
		$LARGURA_NOVA = $V1;
		$ALTURA_NOVA = $V2;
	}
	$valid=explode(".",$NOME);
	$extencao=strtolower($valid[1]);
	$extencao=trim($extencao);
	if (($extencao=="jpg") || ($extencao=="jpeg")) {
		@mkdir($DESTINO);
		$NOVO_NOME = $NOVO_NOME.".$extencao";
		if (copy($IMAGEM, "$DESTINO/$NOVO_NOME"))	{
			$img_base=imagecreatefromjpeg ("$DESTINO/$NOVO_NOME"); 
			$img_nova = imagecreatetruecolor($LARGURA_NOVA,$ALTURA_NOVA); 
			$ratio = $largura / $altura ;
			$RATIO_NOVO = $LARGURA_NOVA / $ALTURA_NOVA;
			if ($ratio > $RATIO_NOVO) {
				$altura_n = $altura;
				$largura_n = intval($altura * $RATIO_NOVO) ;
				$x_n= intval(($largura - $largura_n)/2);
				$y_n= 0;
				imagecopyresized ($img_nova, $img_base, 0, 0, $x_n,$y_n, $LARGURA_NOVA, $ALTURA_NOVA, $largura_n, $altura_n);
			} else {
				$largura_n = $largura;
				$altura_n = intval($largura_n / $RATIO_NOVO);
				$x_n= intval(($largura - $largura_n)/2);
				$y_n= 0;
				imagecopyresized ($img_nova, $img_base, 0, 0, $x_n,$y_n, $LARGURA_NOVA, $ALTURA_NOVA, $largura_n, $altura_n);
			}
			imagejpeg($img_nova,"$DESTINO/$NOVO_NOME",90);
			return $NOVO_NOME;
		} else {
			echo "<script>alert('O arquivo nao foi enviado')</script>";
			return false;
		}
	} else {
			echo "<script>alert('Tipo incorreto de arquivo')</script>";
			return false;
	}	 
}

}

