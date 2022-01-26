<?php
/*
Creator by Kingtebe
Sorry kako style coding nya masih acak-acakan :v
Btw follow github gw https://github.com/Musk-ID
*/
function curl($url,$settings=[]){
    $options = [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTPHEADER     => [
        "Host:multicoin.ltd",
        "user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1853) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Mobile Safari/537.36",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
        "cookie:".file_get_contents(".cookie")
        ]
    ];
    foreach($settings as $key => $value){
       $options[$key] = $value;
    }
    $ch = curl_init();
    curl_setopt_array($ch,$options);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function repat($value){
    $xnx = str_repeat("-",$value);
    return $xnx."\n";
}

function countdown($second){
    $timer=time()+$second;
    while(true):
       echo "\r				\r";
       $res=$timer-time();
       if($res < 1){ break; }
       echo " [-] Waiting ⟨".date("i:s",$res)."⟩ ";
       sleep(1);
    endwhile;
}

function getGhs(){
    if(file_exists(".cookie")){
       file_get_contents(".cookie");
    }else{
       $kukiw=readline("\n [+] Input cookie: ");
       file_put_contents(".cookie",$kukiw);
    }
    $url = "https://multicoin.ltd/account/dashboard";
    $req = curl($url);
    if(preg_match('~ltd\/user\/login">+.*?</~',$req,$cek)){
       unlink(".cookie");
       exit(" [!] Cookies has expired !\n");
    }else{
       system('clear');
       echo "\n [•] Welcome to the Ghs claim tool\n [•] Author : Kingtebe\n [•] Github : https://github.com/Musk-ID\n [•] Group  : https://t.me/Captain_bulls\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";sleep(3);
       while(true):
         $cut = str_replace("dashboard","claim-bonus",$url,$pek);
         $bonus = curl($cut);
         $post = str_replace("claim-bonus","claim-post",$pek,$res);
         $claim = curl($post);$xnx = $url;$ghs = curl($xnx);
         if(preg_match_all('~<p>([^>]+)</p>~',$ghs,$value)){
         preg_match_all('~<h1\salign\="center"\sid\="([^>]+)">([^>]+)\s</h1>~',$ghs,$amount);
         preg_match_all('~<p>([^>]+)</p>~',$ghs,$Ghs);
         echo " [+] ".$amount[2][0]." BTC\n"." [✓] Active GH/s : ".$Ghs[1][2]."\n".repat(21)." [+] ".$amount[2][1]." DOGE\n"." [✓] Active GH/s : ".$Ghs[1][5]."\n".repat(21)." [+] ".$amount[2][2]." TRX\n"." [✓] Active GH/s : ".$Ghs[1][8]."\n".repat(21)." [+] ".$amount[2][3]." LTC\n"." [✓] Active GH/s : ".$Ghs[1][11]."\n".repat(21)." [+] ".$amount[2][4]." BNB\n"." [✓] Active GH/s : ".$Ghs[1][14]."\n".repat(21)." [+] ".$amount[2][5]." USDT\n"." [✓] Active GH/s : ".$Ghs[1][17]."\n".repat(21);countdown(60*60);
         }else{
         exit(" [!] Claim Ghs fialed !\n");}
       endwhile;

}}getGhs()
?>

