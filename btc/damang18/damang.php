<?php

include("config.php");
$url = "https://apiv1.coinspinner.me/account/signin";

$headers = array();
$headers[] = "user-agent: okhttp/3.6.0";




function isi($headers, $cas){
   $i = 0;
   while (True){
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "https://apiv1.coinspinner.me/balance/claim-reward");
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $cas);
     curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
     $konten = curl_exec($ch);
     curl_close($ch);
     $res = json_decode($konten, true);
     if ($res["message"] == true){
        echo "\n\033[1;32mMensahe \033[1;31m: \033[1;0m".$res["message"];
        sleep(5);
        $i++;
        if ($i == 5){
           if ($stat == true){
                break;
           }else{
                 echo "\n\033[1;0m Subukan pagkalipas ng isang oras .Para maka exit isulat ang exit at pindutin ang enter....!\n";
                 exit();
           }
        }
     }else{
        $stat = true;
        echo "\n\033[1;32mEnirhiya \033[1;31m: \033[1;0m".$res["energy"];
        sleep(30);
        if ($res["energy"] > 50000){
            echo "\n\033[1;32mTapos kunang kargahan ang enirhiya mo tamad ka kasing mag view ng mga adds";
            sleep(2);
            break;
        }
     }
   }
}


function spin($headers, $data, $cas){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://apiv1.coinspinner.me/play");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
   $result = curl_exec($ch);
   curl_close($ch);
   $respon = json_decode($result, true);
   if ($respon["energy"] < 3000){
        if ($respon["game_result"]["reward"] == null){
           echo "\033[1;31m\n\nAng baba ng emirhiya mo\n\033[1;0m Sinusubok kargahan ang enirhiya mo......!";
           sleep(3);
           isi($headers, $cas);
        }else{
           echo "\033[1;32mPabuya \033[1;31m:\033[1;0m ".$respon["game_result"]["reward"]." \033[1;33m~ \033[1;32mBalanse \033[1;31m:\033[1;0m ".$respon["balance"]."\n";
           sleep(3);
           echo "\033[1;31m\n\nMababa ang iyong enirhiya\n\033[1;0m Sinusubok kung kargahan ang enirhiya mo....!";
           sleep(3);
           isi($headers, $cas);
        }
   }else{
        echo "\033[1;32mAmg iyong Pabuya \033[1;31m:\033[1;0m ".$respon["game_result"]["reward"]." \033[1;33m~ \033[1;32mAng iyong Balanse \033[1;31m:\033[1;0m ".$respon["balance"]."\n";
   }


}

$sign = array(
  "email" => $email,
  "deviceID" => $deviceid
);
$signin = json_encode($sign, true);


$banner = "\033[0;32m=========================================================\033[0;31s
 ____ _____ ____   ____        _
| __ )_   _/ ___| / ___| _ __ (_)_ __  _ __   ___ _ __
|  _ \ | || |     \___ \| '_ \| | '_ \| '_ \ / _ \ '__|
| |_) || || |___   ___) | |_) | | | | | | | |  __/ |
|____/ |_| \____| |____/| .__/|_|_| |_|_| |_|\___|_|
                        |_|
\033[0;32m=========================================================
\033[1;32mAuthor By  \033[1;31m:\033[1;0m Damang      \033[1;30m|\033[1;32m Auto bot spinner BTC
\033[1;32mChannel Yt \033[1;31m: \033[1;0mTermux Tricks & Tutorial \033[1;30m|\033[1;31m Wag abusuhin maging responsable";

function kunci($banner){
    $i = 0;
    while (True){
        system("clear");
        echo $banner;
        echo "\n\n\033[1;32mIpasok ang password : ";
        $passw = trim(fgets(STDIN));
        if ($passw == "damang"){
           break;
        }else{
           echo "\033[1;31mMali ang password...!";
           sleep(1);
           $i++;
           if ($i == 3){
              echo "\n\033[1;0mAng bobo mo po password nalang nga indi pa magawa ng tama
Kontakin nyo po ako para sa password magpadala ka ng mensahe sa aking\nfacebook account: www
facebook/jonhmabine

type mo exit para lumabas\n";
              sleep(5);
              exit();
           }

        }
    }
}

kunci($banner);
system("clear");
echo $banner;
echo "\n\n\n\033[1;33mSinu subok pumasok \033[1;0m";
sleep(1);
echo ".";
sleep(1);
echo ".";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $signin);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
$result = curl_exec($ch);
curl_close($ch);
$json = json_decode($result, true);
if ($json["status"] == true){
   sleep(1);
   echo ".";
   sleep(1);
   echo "!";
   echo "\n\033[1;31mLogin ERROr\n\033[1;32mNaku! po! ang bobo mo mali po ang nilagay mong email. at ang tanga mo mo pati device id ginalaw mo nag mamarunong ka!!.\n";
   sleep(3);
   exit();
}else {
   $csd = array("account_id" => $json["account_id"]);
   $cas = json_encode($csd, true);
   $claim = array (
      "game" => "smallspin",
      "account_id" => $json["account_id"],
      "locale" => "in_US",
      "deviceID" => $deviceid,
      "use_old" => "false",);
   $data = json_encode($claim, true);
   sleep(1);
   echo ".";
   sleep(1);
   echo "!";
   echo "\033[1;32m\nMatagpay ang pag log in\n";
   $info = "https://apiv1.coinspinner.me/account/info/".$json["account_id"];
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $info);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
   $konten = curl_exec($ch);
   curl_close($ch);
   $json1 = json_decode($konten, true);
   echo "\033[1;32mBalanse  \033[1;31m: \033[1;0m".$json1["balance"]."\n";
   echo "\033[1;32mEnirhiya    \033[1;31m: \033[1;0m".$json1["energy"]."\n";
   echo "\033[1;32mRefferral\033[1;31m : \033[1;0m".$json1["referral"]."\n";
   sleep(3);
   if($json1["energy"] < 3000){
      echo "\033[1;31m\n\nPasinsya na po mababa na talaga ang enirhiya mo\n\033[1;0mSinu subokan kung kargahan ang iyong ernirhiya....!\n";
      sleep(3);
      isi($headers, $cas);
   }else {
      echo "\n\033[1;33mNasisimula ng magpaikot......!\n";
      while (True){
          spin($headers, $data, $cas);
          sleep(30);
      }
   }

}

?>
