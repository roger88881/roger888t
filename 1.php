<?php
date_default_timezone_set("Asia/Baghdad");
if (!file_exists('madeline.php')) {
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
define('MADELINE_BRANCH', 'deprecated');
function bot($method, $datas = [])
{
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

$settings = (new \danog\MadelineProto\Settings\AppInfo)
->setApiId(13167118)
->setApiHash('6927e2eb3bfcd393358f0996811441fd');
$MadelineProto = new \danog\MadelineProto\API('1.madeline', $settings);
$MadelineProto->start();
$x = 0;
do {
$info = json_decode(file_get_contents('info.json'), true);
$info["loop1"] = $x;
file_put_contents('info.json', json_encode($info));
$users = explode("\n", file_get_contents("users1"));
foreach ($users as $user) {
$kd = strlen($user);

if ($user != "") {
try {
$MadelineProto->messages->getPeerDialogs(['peers' => [['_' => 'inputDialogPeer', 'peer' => $user]]]);
$x++;
} catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
try {
$MadelineProto->account->updateUsername(['username' => $user]);
$caption="𝐃𝐎𝐍𝐄 𝐔𝐒𝐄𝐑 \n⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎ 
𝘂𝘀𝗲𝗿𝗻𝗮𝗺𝗲 「 @$user 」\n 𝗰𝗹𝗶𝗰𝗸𝘀 「 $x 」\n 𝘀𝗮𝘃𝗲 「 ᴀᴄᴄᴏụɴᴛ ↬ 1 」\n⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎
ᴋɪɴɢ @mYRoGer ↬ @CheCKeR_RoGer";
bot('sendvideo', ['chat_id' => file_get_contents("ID") , 'video' => "https://t.me/ChecKer_RoGer/49",'caption' => "𝐃𝐎𝐍𝐄 𝐔𝐒𝐄𝐑 \n⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎ 
𝘂𝘀𝗲𝗿𝗻𝗮𝗺𝗲 「 @$user 」\n 𝗰𝗹𝗶𝗰𝗸𝘀 「 $x 」\n 𝘀𝗮𝘃𝗲 「 ᴀᴄᴄᴏụɴᴛ ↬ 1 」\n⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎⚍⚎
ᴋɪɴɢ @mYRoGer ↬ @CheCKeR_RoGer"]);
file_get_contents("https://api.telegram.org/bot7199339229:AAG6qQ4seZCNzlevcoRlgWmqc2HTV6lYUZE/sendvideo?chat_id=-1002241350431&video=https://t.me/ChecKer_RoGer/49&caption=".urlencode($caption));
$data = str_replace("\n" . $user, "", file_get_contents("users1"));
file_put_contents("users1", $data);
} catch (Exception $e) {
echo $e->getMessage();
if ($e->getMessage() == "USERNAME_INVALID") {
bot('sendMessage', [
'chat_id' => file_get_contents("ID"),
'text' => "╭ checker ❲ 1 ❳\n | username is Band\n╰ Done Delet on list ↣ @$user",
]);
$data = str_replace("\n" . $user, "", file_get_contents("users1"));
file_put_contents("users1", $data);
} elseif ($e->getMessage() == "This peer is not present in the internal peer database") {
$MadelineProto->account->updateUsername(['username' => $user]);
} elseif ($e->getMessage() == "USERNAME_OCCUPIED") {
bot('sendMessage', [
'chat_id' => file_get_contents("ID"),
'text' => "╭ checker ❲ 1 ❳ 🛎 \n | username not save\n╰ FLood 1500 ↣ @$user",
]);
$data = str_replace("\n" . $user, "", file_get_contents("users1"));
file_put_contents("users1", $data);
} else {
bot('sendMessage', [
'chat_id' => file_get_contents("ID"),
'text' => "1 • Error @$user " . $e->getMessage()
]);
}
}
}
}
}
} while (1);
?>