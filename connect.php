<?
/* ============= CRUD ==================*/
include('funcoes/CRUD.php');
include('funcoes/Funcoes.php');
/* ============= FIM CRUD ==================*/

if(!isset($_SESSION)) session_start();
header('Content-Type: text/html; charset=utf-8');
if (!class_exists('Conexao')) {

    if ($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='servidor' ) {
        DEFINE('DB_HOST','localhost:3308');
        DEFINE('DB_USER','root');
        DEFINE('DB_PASS','');
        DEFINE('DB_TABLE','bitcoin');
        DEFINE('SITE_URL', 'http://localhost/Block%20Academy/');
       DEFINE('GERENCIE_LIB', 'http://www.agenciasingular.com.br/gerencielib/');
    }
    

    // print DB_HOST." ".DB_USER." ".DB_PASS." ".DB_TABLE." ".SITE_URL;

    //DEFINIR NOME DA SESS�O
    DEFINE('NOME_SESSAO', 'login_gerencieadibravi');

    DEFINE('NOME_SITE', utf8_encode('blockacademy'));

    DEFINE('EMAIL_GERENCIE', 'gerencie@agenciasingular.com.br'); // email da singular
    DEFINE('USUARIO_EMAIL_AUTENTICADO', 'noreply@adibravi.com.br'); // DEVE CRIAR UM EMAIL PARA ENVIO
    DEFINE('SENHA_EMAIL_AUTENTICADO', 'adibraviImob2016'); // DEVE CRIAR UM EMAIL PARA ENVIO


    class Conexao extends PDO {

        private static $instancia;

        public function __construct($dsn, $username = "", $password = "") {
            // O construtro abaixo � o do PDO
            parent::__construct($dsn, $username, $password);
        }

        public static function getInstance() {
            if(!isset( self::$instancia )){
                try {
                    self::$instancia = new Conexao("mysql:host=".DB_HOST.";dbname=".DB_TABLE, DB_USER , DB_PASS, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true ));

                } catch ( Exception $e ) {
                    echo 'Erro ao conectar';
                    exit ();
                }
            }
            return self::$instancia;
        }
    }

    $DB = Conexao::getInstance();
    $a = $DB->query("SET NAMES utf8;SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;SET time_zone='-3:00';");
    $a->closeCursor();

    date_default_timezone_set('America/Sao_paulo');
    setlocale(LC_ALL, "pt_BR");

    /*
    function __autoload($classe) {
        require_once "/gerencie/includes/$classe/". $c'lasse . '.php';
    }
    */

}
?>