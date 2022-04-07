<? 

function paginar($total, $pag , $id = "paginacao" ) {
	
	$itens = "";
	
	if($total>1){	
		for ($i=1; $i<=$total; $i++) $itens .= "<a ".($i==$pag? "" : "href='?pag=$i'").($i==$pag? " class='ativo'" : "").">$i</a>";
		$itens = "<div id='$id'>" . $itens . "</div>";
	}
	
	return $itens;
}

function aspectRatio($a, $b , $c = null) {  
	
	$aa = $a;
	$bb = $b;
	
	while ($b != 0) {
		$remainder = $a % $b;  
		$a = $b;  
		$b = $remainder;  
	} 	 
	$gcd = abs ($a);  
	$a = $aa;
	$b = $bb;
	$a = $a/$gcd;  
	$b = $b/$gcd;  
	$ratio = $a . ":" . $b;  
	
	if (isset($c)){
		return array($ratio, $a, $b);
	} else {
		return $ratio;
	}
	

} 


function showmes($strmes){
$strmes = intval($strmes)  ;
$meses = array('a', 'Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril ','Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
return $meses[$strmes];
}

function showMINImes($strmes){
$strmes = intval($strmes)  ;
$meses = array('a', 'JAN', 'FEV', 'MAR', 'ABR ','MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ');
return $meses[$strmes];
}

function showrequer($strpag){
$strpag = intval($strpag);
if($strpag<6){
$pages = array('NENHUMA!', 'Palestras e Cursos', 'Palestras', 'Cursos', 'Not&iacute;cias','Produtos');
return $pages[$strpag];
}else{
return "Palestras e Cursos";
}
}

function converter_data($strData) {
        // Recebemos a data no formato: dd/mm/aaaa
        // Convertemos a data para o formato: aaaa-mm-dd
        if ( preg_match("#/#",$strData) == 1 ) {
                $strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
        }
        return $strDataFinal;
}
function showfab($id){
    $sqlshowfab = mysql_query("select nome from fabricantes where id='$id'") or die("erro linha 18: ".mysql_error());
    if(mysql_num_rows($sqlshowfab)>0){
		$fab = mysql_fetch_array($sqlshowfab);	
		return $fab['nome'];	
	} else{
		return "";
	}
	
}
function showc($fComb, $fGnv ){
	if ($fComb=="a"){
		$result = "Álcool";
	} else if ($fComb=="g"){
		$result = "Gasolina";
	} else if ($fComb=="f"){
		$result = "Flex";
	} else if ($fComb=="d"){
		$result = "Diesel";
	}	
	if ($fGnv>0) {
		$result .=" + Gnv";
	}
	return $result;
	
}
function showcat($id){
    $sqlshowcat = mysql_query("select nome from categorias where id='$id'");
    $cat = mysql_fetch_array($sqlshowcat);
	return $cat['nome'];
}
function showlinha($id){
    if($id==1){
		return "Anest&eacute;sicos";
	} else if($id==2){
		return "Produtos Veterin&aacute;rios";
	} else if($id==3){
		return "Produtos Hospitalares";
	} else if($id==4){
		return "Higiene e Beleza";
	} else if($id==5){
		return "Ra&ccedil;&otilde;es";
	}
}
 /* RALPH */

function asi($string)
{
    $string = get_magic_quotes_gpc() ? stripslashes($string) : $string;
    $string = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($string) : mysql_escape_string($string);
    return $string;
}

function textarea($nome,$valor,$largura=0,$altura=400,$tipo="") {
	$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "novo.php" ) ) ."../../../fckeditor/";
	$oFCKeditor = new FCKeditor($nome) ;
	if (!empty($tipo)) {
		$oFCKeditor->ToolbarSet = $tipo;
	}
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $valor ;
	$oFCKeditor->Height 	= $altura ;
	if ($largura>0) {
		$oFCKeditor->Width 	= $largura ;
	}
	$oFCKeditor->Create() ;
}

function fdata($data,$tipo){
	$exData = substr($data,0,10);
	$exData = explode($tipo,$exData);
	if($tipo=='/'){
		$date = $exData[2].'-'.$exData[1].'-'.$exData[0];		
	}else if($tipo=='-'){
		$date = $exData[2].'/'.$exData[1].'/'.$exData[0];
	}else{
		return 'erro';
	}		
	return $date;
}
function tiraponto($campo) {
	$campo1 = str_replace(array('.','-','(',')','/'),'',$campo);
	return $campo1;
}
	
function testaemail($email)
{
   $mail_correcto = 0;
   //verifico umas coisas
   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
      if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
         //vejo se tem caracter .
         if (substr_count($email,".")>= 1){
            //obtenho a terminação do dominio
            $term_dom = substr(strrchr ($email, '.'),1);
            //verifico que a terminação do dominio seja correcta
         if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
            //verifico que o de antes do dominio seja correcto
            $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
            $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
            if ($caracter_ult != "@" && $caracter_ult != "."){
               return "true";
            }
         }
      }
   }
}
}

function validacpf($CampoNumero)
{
	$RecebeCPF=$CampoNumero;
   //Retirar todos os caracteres que nao sejam 0-9
   $s="";
   for ($x=1; $x<=strlen($RecebeCPF); $x=$x+1)
   {
    $ch=substr($RecebeCPF,$x-1,1);
    if (ord($ch)>=48 && ord($ch)<=57)
    {
      $s=$s.$ch;
    }
   }
    
   $RecebeCPF=$s;
   if (strlen($RecebeCPF)!=11)
   {
    return "false";
   }
   else
     if ($RecebeCPF=="00000000000")
     {
       $then;
       return "false";
     }
     else
     {
      $Numero[1]=intval(substr($RecebeCPF,1-1,1));
      $Numero[2]=intval(substr($RecebeCPF,2-1,1));
      $Numero[3]=intval(substr($RecebeCPF,3-1,1));
      $Numero[4]=intval(substr($RecebeCPF,4-1,1));
      $Numero[5]=intval(substr($RecebeCPF,5-1,1));
      $Numero[6]=intval(substr($RecebeCPF,6-1,1));
      $Numero[7]=intval(substr($RecebeCPF,7-1,1));
      $Numero[8]=intval(substr($RecebeCPF,8-1,1));
      $Numero[9]=intval(substr($RecebeCPF,9-1,1));
      $Numero[10]=intval(substr($RecebeCPF,10-1,1));
      $Numero[11]=intval(substr($RecebeCPF,11-1,1));

     $soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*
     $Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];
     $soma=$soma-(11*(intval($soma/11)));

    if ($soma==0 || $soma==1)
    {
      $resultado1=0;
    }
    else
    {
      $resultado1=11-$soma;
    }

    if ($resultado1==$Numero[10])
    {
     $soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+$Numero[7]*5+
     $Numero[8]*4+$Numero[9]*3+$Numero[10]*2;
     $soma=$soma-(11*(intval($soma/11)));

     if ($soma==0 || $soma==1)
     {
       $resultado2=0;
     }
     else
     {
      $resultado2=11-$soma;
     }
     if ($resultado2==$Numero[11])
     {
      return "true";
     }
     else
     {
     return "false";
     }
    }
    else
    {
     return "false";
    }
   }
   
}


function encurtaUrl($urlDecodificar){

	if($urlDecodificar!='') {
		
		$url = 'https://www.googleapis.com/urlshortener/v1/url';
		$data['longUrl'] = $urlDecodificar;
		$data['key'] = 'AIzaSyAVkPHe4rfFByMRqGfsI4ungUaNzkO284Q';
		$data = json_encode($data);
		
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$data = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($data);

		//print_r($data);
	
		return $data->id;
		
	} else {
		return false;
	}

}

$diasdasemana = array (1 => "Segunda-Feira",2 => "Ter&ccedil;a-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "S&aacute;bado",0 => "Domingo");



function explode_filtered_empty($var) { 
  if ($var == "") 
    return(false); 
  return(true); 
} 
function explode_filtered($delimiter, $str) { 
  $parts = explode($delimiter, $str); 
  return(array_filter($parts, "explode_filtered_empty")); 
}
?>