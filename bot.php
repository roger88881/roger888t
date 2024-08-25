<?php
date_default_timezone_set("Asia/Baghdad");
error_reporting(0);
function bot($method, $datas = []) {
$token = file_get_contents("token");
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
function curl_get($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/967.46 (KHTML, like Gecko) Chrome/90.0.1931.128 Safari/967.46');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
$ch_data = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}
curl_close($ch);
return $ch_data;
}
function getupdates($up_id) {
$get = bot('getupdates', ['offset' => $up_id]);
return end($get['result']);
}
$botuser = "@" . bot('getme', ['bot']) ["result"]["username"];
file_put_contents("besso/_ad.txt", $botuser);
function stats($nn) {
$st = "";
$x = shell_exec("pm2 show $nn");
if (preg_match("/online/", $x)) {
$st = "run";
}
else {
$st = "stop";
}
return $st;
}
function states($g) {
$st = "";
$x = shell_exec("pm2 show $g");
if(preg_match("/online/", $x)) {
$st = "run";
}else{
$st = "stop";
}
return $st;
}
function countUsers($u = "2", $t = "2") {
if ($t == "2") {
$users = explode("\n", file_get_contents("users1"));
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i➧ @$user";
$i++;
}
}
if ($list == "") {
return "There is no username in the list";
}
else {
return $list;
}
}
if ($t == "1") {
$users = explode("\n", $u);
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i➧ @$user";
$i++;
}
}
if ($list == "") {
return "There is no username in the list";
}
else {
return $list;
}
}
}
$step = "";
function run($update) {
global $step;
$nn = bot('getme', ['bot']) ["result"]["username"];
$message = $update['message'];
$userID = $message['from']['id'];
$chat_id = $message['chat']['id'];
$name = $message['from']['first_name'];
$text = $message['text'];
$date = $update['callback_query']['data'];
$cq = $update['callback_query'];
$data = $cq['data'];
$message_id = $cq['message']['message_id'];
$chat_id2 = $cq['message']['chat']['id'];
$group = file_get_contents("ID");
$js = json_decode($g);
$da = $js->date;
$time = $js->time;
$day = $js->day;
$month = $js->month;
$ad = array("$group");
if($text == "/start" and !in_array($chat_id,$ad) and $chat_id != $group = null){
bot('sendmessage',[ 
'chat_id'=>$chat_id,
'text'=>" 
- 𝒘𝒆𝒍𝒄𝒐𝒎 𝒕𝒐 𝒉𝒆𝒍𝒍 [$name](tg://user?id=$chat_id) !
- 𝒊𝒏 𝒕𝒉𝒆 𝒄𝒉𝒆𝒄𝒌𝒆𝒓 𝒖𝒔𝒆𝒓 𝒏𝒂𝒎𝒆 𝒕𝒆𝒍𝒆𝒈𝒓𝒂𝒎 
- 𝒅𝒆𝒗𝒆𝒍𝒐𝒑𝒆𝒅 𝒃𝒚 𝒓𝒐𝒈𝒆𝒓 🏴‍☠️ @mYRoger .
",'parse_mode' => "MarkDown", 'disable_web_page_preview' => true,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "-𝒓𝒐𝒈𝒆𝒓'", 'url' => "https://t.me/mYRoger"]],
[['text' => "-𝒎𝒆 𝒄𝒉𝒂𝒏𝒏𝒆𝒍'", 'url' => "https://t.me/cHecker_roger"]],
]]) 
]);
}
if ($chat_id == $group) {
if ($text) {
if ($text == "/start" || $text == "𝖉𝖆𝖈𝖐") {
    $file_id = 'https://t.me/ChecKer_RoGer/60'; 
    $response = bot('sendVideo', [
        'chat_id' => $chat_id, 
        'video' => $file_id, 
        'caption' => "• ➦ 𝐇𝐈 \n• ➦ 𝐓𝐇𝐄 𝐁𝐄𝐒𝐓 𝐂𝐇𝐄𝐂𝐊𝐄𝐑 𝐈𝐍 𝐓𝐄𝑳𝐄𝐆𝐑𝐀𝐌\n• ➦ 𝐁𝐘 : @mYRoGer ↬ @cHeker_roger" 
    ]);
    print_r($response);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "Hi, [$name](tg://user?id=$chat_id)",
        'parse_mode' => "Markdown", 
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'resize_keyboard' => true, 
            'keyboard' => [
                [['text' => "ا𝖆𝖉𝖉 𝖔𝖗 𝖉𝖊𝖑𝖊𝖙𝖊 𝖆 𝖓𝖚𝖒𝖇𝖊𝖗"], ['text' => "𝖆𝖉𝖉 𝖔𝖗 𝖉𝖊𝖑𝖊𝖙𝖊 𝖚𝖘𝖊𝖗"]],
                [['text' => "𝖗𝖚𝖓 𝖔𝖗 𝖘𝖙𝖔𝖕"]],
                [['text' => "𝖘𝖍𝖔𝒘 𝖚𝖘𝖊𝖗𝖓𝖆𝖒𝖊𝖘"], ['text' => "𝖈𝖗𝖎𝖈𝖐𝖘"]],
                [['text' => "Huting => @mYRoged - @Checker_Roger"]],
                [['text' => "𝖚𝖕𝖉𝖆𝖙𝖊 𝖍𝖚𝖓𝖙𝖎𝖓𝖌 𝖋𝖎𝖗𝖊𝖘"], ['text' => "𝖈𝖍𝖊𝖈𝖐𝖊𝖗 𝖔𝖋𝖋𝖎𝖈𝖊 𝖚𝖕𝖉𝖆𝖙𝖊"]],
                [['text' => "𝖚𝖕𝖉𝖆𝖙𝖊 𝖈𝖔𝖓𝖙𝖗𝖔𝖗 𝖉𝖔𝖙"]]
            ]
        ]) 
    ]);
}
$info = json_decode(file_get_contents('info.json'),true);
$loop1 = $info["loop1"];
$loop2 = $info["loop2"];
$loop3 = $info["loop3"];
$loop4 = $info["loop4"];
$loop5 = $info["loop5"];
$loop6 = $info["loop6"];
$loop7 = $info["loop7"];
$loop8 = $info["loop8"];
$loop9 = $info["loop9"];
$loop10 = $info["loop10"];
file_put_contents('info.json', json_encode($info));
if ($chat_id == $group) {
if($text == '𝖈𝖗𝖎𝖈𝖐𝖘'){
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"𖠜 Clicks Requests Of Numbers 𓆪 •",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"1 ↣  $loop1 ",'callback_data'=>"U"],['text'=>"2 ↣  $loop2 ",'callback_data'=>"U"]],
[['text'=>"3 ↣  $loop3 ",'callback_data'=>"U"],['text'=>"4 ↣  $loop4 ",'callback_data'=>"U"]],
[['text'=>"5 ↣  $loop5 ",'callback_data'=>"U"],['text'=>"6 ↣  $loop6 ",'callback_data'=>"U"]],
[['text'=>"7 ↣  $loop7 ",'callback_data'=>"U"],['text'=>"8 ↣  $loop8 ",'callback_data'=>"U"]],
[['text'=>"9 ↣  $loop9 ",'callback_data'=>"U"],['text'=>"10 ↣  $loop10 ",'callback_data'=>"U"]],
]])]);
}}
if($text == "𝖚𝖕𝖉𝖆𝖙𝖊 𝖈𝖔𝖓𝖙𝖗𝖔𝖗 𝖉𝖔𝖙"){
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The source has been updated ",
]);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/bot.php");
file_put_contents("bot.php",$up_file);
shell_exec("killall screen && screen -dmS bot php7.4 bot.php");
}
if($text == "𝖚𝖕𝖉𝖆𝖙𝖊 𝖍𝖚𝖓𝖙𝖎𝖓𝖌 𝖋𝖎𝖗𝖊𝖘"){
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The source has been updated ",
]);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/1.php");
file_put_contents("1.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/2.php");
file_put_contents("2.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/3.php");
file_put_contents("3.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/4.php");
file_put_contents("4.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/5.php");
file_put_contents("5.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/6.php");
file_put_contents("6.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/7.php");
file_put_contents("7.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/8.php");
file_put_contents("8.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/9.php");
file_put_contents("9.php",$up_file);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/10.php");
file_put_contents("10.php",$up_file);
shell_exec("pm2 stop 1.php");
shell_exec("pm2 stop 2.php");
shell_exec("pm2 stop 3.php");
shell_exec("pm2 stop 4.php");
shell_exec("pm2 stop 5.php");
shell_exec("pm2 stop 6.php");
shell_exec("pm2 stop 7.php");
shell_exec("pm2 stop 8.php");
shell_exec("pm2 stop 9.php");
shell_exec("pm2 stop 10.php");
shell_exec("pm2 stop 1.php");
shell_exec("pm2 start 1.php");
shell_exec("pm2 start 2.php");
shell_exec("pm2 start 3.php");
shell_exec("pm2 start 4.php");
shell_exec("pm2 start 5.php");
shell_exec("pm2 start 6.php");
shell_exec("pm2 start 7.php");
shell_exec("pm2 start 8.php");
shell_exec("pm2 start 9.php");
shell_exec("pm2 start 10.php");
}
if($text == "𝖈𝖍𝖊𝖈𝖐𝖊𝖗 𝖔𝖋𝖋𝖎𝖈𝖊 𝖚𝖕𝖉𝖆𝖙𝖊"){
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The source has been updated ",
]);
$up_file = curl_get("https://raw.githubusercontent.com/roger88881/roger888t/main/madeline.php");
file_put_contents("madeline.php",$up_file);
}
if (preg_match('/Run Account \d+/',$text)){
$ex = explode('Run Account ',$text);
shell_exec("pm2 start $ex[1].php");
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"⌁ Done type to Account ".$ex[1]."✅",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
##اضف رقم او حذف###
if ($chat_id == $group) {
if ($text == "ا𝖆𝖉𝖉 𝖔𝖗 𝖉𝖊𝖑𝖊𝖙𝖊 𝖆 𝖓𝖚𝖒𝖇𝖊𝖗") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"𝖉𝖆𝖈𝖐"]],
[["text" =>"Login1"],["text" =>"Delete number1"]],
[["text" =>"Login2"],["text" =>"Delete number2"]],
[["text" =>"Login3"],["text" =>"Delete number3"]],
[["text" =>"Login4"],["text" =>"Delete number4"]],
[["text" =>"Login5"],["text" =>"Delete number5"]],
[["text" =>"Login6"],["text" =>"Delete number6"]],
[["text" =>"Login7"],["text" =>"Delete number7"]],
[["text" =>"Login8"],["text" =>"Delete number8"]],
[["text" =>"Login9"],["text" =>"Delete number9"]],
[["text" =>"Login10"],["text" =>"Delete number10"]]],]) ]);
}}
if (preg_match('/Login\d+/',$text)){
$ex = explode('Login',$text);
bot('sendMessage',['chat_id' => $chat_id, 'text' => "• تشيكر رقم ".$ex[1].".\n• ارسل رقم الحساب الان .\n•مثال \n+3387287822"]);
file_put_contents("TheN",$ex[1]);
unlink($ex[1].".madeline");
unlink($ex[1].".madeline.lock");
file_put_contents("step","2");
system('php Login.php');
}
if (preg_match('/Delete number\d+/',$text)){
$ex = explode('Delete number',$text);
bot('sendMessage',['chat_id' => $chat_id, 'text' => "• التشيكر رقم ".$ex[1]." - \n• تم حذفه بنجاح ."]);
unlink("TheN");
unlink($ex[1].".madeline"); 
unlink($ex[1].".madeline.lock");
unlink($ex[1].".madeline.lightState.php");
unlink($ex[1].".madeline.lightState.php.lock");
unlink($ex[1].".madeline.safe.php");
unlink($ex[1].".madeline.safe.php.lock");
system('rm -rf '.$ex[1].'.madeline && rm -rf '.$ex[1].'.madeline.lock && rm -rf '.$ex[1].'.madeline.lightState.php && rm -rf '.$ex[1].'.madeline.lightState.php.lock && rm -rf '.$ex[1].'.madeline.safe.php && rm -rf '.$ex[1].'.madeline.safe.php.lock');
}
####رن او ستوب###
if ($chat_id == $group) {
if ($text == "𝖗𝖚𝖓 𝖔𝖗 𝖘𝖙𝖔𝖕") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"𝖉𝖆𝖈𝖐"]],
[["text" =>"Stop Run 1"],["text" =>"Run Account 1"]],
[["text" =>"Stop Run 2"],["text" =>"Run Account 2"]],
[["text" =>"Stop Run 3"],["text" =>"Run Account 3"]],
[["text" =>"Stop Run 4"],["text" =>"Run Account 4"]],
[["text" =>"Stop Run 5"],["text" =>"Run Account 5"]],
[["text" =>"Stop Run 6"],["text" =>"Run Account 6"]],
[["text" =>"Stop Run 7"],["text" =>"Run Account 7"]],
[["text" =>"Stop Run 8"],["text" =>"Run Account 8"]],
[["text" =>"Stop Run 9"],["text" =>"Run Account 9"]],
[["text" =>"Stop Run 10"],["text" =>"Run Account 10"]]],]) ]);
}}
if (preg_match('/Stop Run \d+/',$text)){
$ex = explode('Stop Run ',$text);
$info = json_decode(file_get_contents('info.json'),true);
$info["loop".$ex[1]] = "off";
file_put_contents('info.json', json_encode($info));
shell_exec("pm2 stop $ex[1].php");
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List ".$ex[1]." 🔐",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],]])]);
$info = json_decode(file_get_contents('info.json'),true);
$info["num".$ex[1]] = "off";
file_put_contents('info.json', json_encode($info));
}
##اضف حذف يوزر###
if ($chat_id == $group) {
if ($text == "𝖆𝖉𝖉 𝖔𝖗 𝖉𝖊𝖑𝖊𝖙𝖊 𝖚𝖘𝖊𝖗") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"𝖉𝖆𝖈𝖐"]],
[["text" =>"add List 1"],["text" =>"Delet - 1"]],
[["text" =>"add List 2"],["text" =>"Delet - 2"]],
[["text" =>"add List 3"],["text" =>"Delet - 3"]],
[["text" =>"add List 4"],["text" =>"Delet - 4"]],
[["text" =>"add List 5"],["text" =>"Delet - 5"]],
[["text" =>"add List 6"],["text" =>"Delet - 6"]],
[["text" =>"add List 7"],["text" =>"Delet - 7"]],
[["text" =>"add List 8"],["text" =>"Delet - 8"]],
[["text" =>"add List 9"],["text" =>"Delet - 9"]],
[["text" =>"add List 10"],["text" =>"Delet - 10"]]],]) ]);
}}
if (preg_match('/add List \d+/',$text)){
$ex = explode('add List ',$text);
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"Send List ".$ex[1]." 📥",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],]])]);
file_put_contents('mode', 'besso'.$ex[1]);
}
if (preg_match('/Delet - \d+/',$text)){
$ex = explode('Delet - ',$text);
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"Delet List ".$ex[1]." 🗑",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],]])]);
file_put_contents('mode', 'Unpin'.$ex[1]);
} 
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users1'));
if(preg_match("/@+/", $text)){
if($mode == 'Pi0n'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users1", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"⌁ Done Delet User List 2 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} 
if($mode == 'Unpin1'){
echo 'Unpin1';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users1"));
file_put_contents("users1", $data);
file_put_contents("users1",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users1"))));
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 1 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso1'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users1"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users1", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 1 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users2'));
if(preg_match("/@+/", $text)){
if($mode == 'Pi0n'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users2", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"⌁ Done Delet User List 2 : @$user" ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin2'){
echo 'Unpin2';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users2"));
file_put_contents("users2", $data);
file_put_contents("users2",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users2"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 2 : @$user" ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso2'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users2"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users2", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 2 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users3'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users3", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);}
unlink('mode');
}elseif($mode == 'Unpin3'){
echo 'Unpin3';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users3"));
file_put_contents("users3", $data);
file_put_contents("users3",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users3"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 3 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso3'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users3"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users3", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 3 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users4'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users4", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin4'){
echo 'Unpin4';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users4"));
file_put_contents("users4", $data);
file_put_contents("users4",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users4"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 4 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso4'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users4"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users4", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 4 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users5'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users5", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin5'){
echo 'Unpin5';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users5"));
file_put_contents("users5", $data);
file_put_contents("users5",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users5"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 5 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso5'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users5"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users5", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 5 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users6'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users6", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin6'){
echo 'Unpin6';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users6"));
file_put_contents("users6", $data);
file_put_contents("users6",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users6"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 6 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso6'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users6"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users6", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 6 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users7'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users7", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin7'){
echo 'Unpin7';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users7"));
file_put_contents("users7", $data);
file_put_contents("users7",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users7"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 7 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso7'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users7"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users7", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 7 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users8'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users8", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin8'){
echo 'Unpin8';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users8"));
file_put_contents("users8", $data);
file_put_contents("users8",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users8"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 8 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso8'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users8"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users8", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 8 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users9'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users9", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin9'){
echo 'Unpin9';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users9"));
file_put_contents("users9", $data);
file_put_contents("users9",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users9"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 9 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso9'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users9"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users9", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 9 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users10'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users10", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin10'){
echo 'Unpin10';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users10"));
file_put_contents("users10", $data);
file_put_contents("users10",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users10"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 10 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}elseif($mode == 'besso10'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users10"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users10", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 10 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
unlink('mode');
}
}}
}
##عرض السته او حذف##
if ($chat_id == $group) {
if ($text == "𝖘𝖍𝖔𝒘 𝖚𝖘𝖊𝖗𝖓𝖆𝖒𝖊𝖘") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"𝖉𝖆𝖈𝖐"]],
[["text" =>"Show All - 1"],["text" =>"Clear list 1"]],
[["text" =>"Show All - 2"],["text" =>"Clear list 2"]],
[["text" =>"Show All - 3"],["text" =>"Clear list 3"]],
[["text" =>"Show All - 4"],["text" =>"Clear list 4"]],
[["text" =>"Show All - 5"],["text" =>"Clear list 5"]],
[["text" =>"Show All - 6"],["text" =>"Clear list 6"]],
[["text" =>"Show All - 7"],["text" =>"Clear list 7"]],
[["text" =>"Show All - 8"],["text" =>"Clear list 8"]],
[["text" =>"Show All - 9"],["text" =>"Clear list 9"]],
[["text" =>"Show All - 10"],["text" =>"Clear list 10"]]],]) ]);
}}
if (preg_match('/Show All - \d+/',$text)){
$ex = explode('Show All - ',$text);
$users = explode("\n", file_get_contents("users".$ex[1]));
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i  ➧ @$user";
$i++;}}
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "• The All Users List ".$ex[1]." 📥 \n".$list ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
}
if (preg_match('/Clear list \d+/',$text)){
$ex = explode('Clear list ',$text);
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Done Delete all Usernames List 1",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "ChanneL Huting Roger", 'url' => "https://t.me/Checker_roged"]],
]])]);
file_put_contents("users".$ex[1], "");
}
}
}
while (true) {
global $last_up;
$get_up = getupdates($last_up + 1);
$last_up = $get_up['update_id'];
if ($get_up) {
run($get_up);
}
}
?>