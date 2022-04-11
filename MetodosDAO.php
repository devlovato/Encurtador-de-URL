
<?php
// include 'conexao.php';

class MetodosDao{

    function FazReq($long_url){
    global $long_url;

    try{
        $API = "https://api-ssl.bitly.com/v4/bitlinks";
        //TOKEN
        $TOKEN_DO_BITLY = "seu-token";
        $LINK = array(
            'long_url' => $long_url
        );
        $INFO = json_encode($LINK);
        $header = array(
            'Authorization: Bearer ' . $TOKEN_DO_BITLY,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($INFO)
        );
        $CH = curl_init($API);
        //SELECIONA O TIPO DE REQUISIÇAO  || ACEITA APENAS TRES PARAMETROS.
        curl_setopt($CH, CURLOPT_CUSTOMREQUEST, "POST");
        //PASSA OS VALORES EXP: VALOR1=VALOR&&VALOR2=VALOR2
        curl_setopt($CH, CURLOPT_POSTFIELDS, $INFO);
        curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($CH, CURLOPT_HTTPHEADER, $header);
        $RESULTADO = curl_exec($CH);
        
        $json = json_decode($RESULTADO);

        if(!empty(isset($json->created_at)&& isset($json->link))){
            echo '<div class="card">';
            echo '<p><spam class="spam">URL:</spam> ' . substr($long_url, 0, 30) . "...<br><br>";
            echo "<spam class='spam'>CRIADO EM:</spam> " . date("Y-m-d", strtotime($json->created_at)) . "<br>\n";
            echo "<br><spam class='spam'>URL ENCURTADA:</spam> <a href='" . $json->link . "'>" . $json->link . "</a></p></div>";
        }
        }catch(Exception $e){
            echo 'ERRO ',  $e->getMessage(), "\n";
        }
    }
}

?>