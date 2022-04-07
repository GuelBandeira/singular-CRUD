<?
function GERA_MUSICA($MUSICA,$DESTINO,$MUSICANOME) {

	if($_FILES[$MUSICA]["size"] > 5120000) {
			return "Seu anexo não poderá ser maior que 5 MB!";
	} else {
		if(!empty($_FILES['mp3']["tmp_name"]) and is_file($_FILES[$MUSICA]["tmp_name"])) {
			
			if(eregi(".mp3$", $_FILES[$MUSICA]["name"])) {
				$caminho = $DESTINO.$MUSICANOME;
				@copy($_FILES[$MUSICA]["tmp_name"],$caminho);
				return true;
			} else {
				return "Extensao invalida";
			}
		
		} else {
			return "Caminho e/ou nome de anexo inválido!";
		}		
		
	}
	
}
?>
