<?php
ob_start();
$API_KEY = '8083937139:AAHiY8hiooFBWYrq9lw1qPQYivcKdzlaxsg';
define('API_KEY',$API_KEY);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$smilestatus = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$smilestatus";
$smilestatush = file_get_contents($url);
return json_decode($smilestatush);}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
	//======ᴏᴍᴀʀ ʜᴀѕʜᴍ ‏ ⌯┆-‏𖤍=========//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$ali = file_get_contents("data/$from_id/ali.txt");
$ADMIN =6397281765;
$to =  file_get_contents("data/$from_id/token.txt");
$url =  file_get_contents("data/$from_id/url.txt");
//========〇ᙢᗩᖇ ᕼᗩᔕᕼᙢ===================//

$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$id = $message->from->id;
$text = $message->text;
$chat_id = $message->chat->id;
$user = $message->from->username;
$name = $message->from->first_name;
$sajad = file_get_contents("rembo.txt");
$ch = file_get_contents("ch.txt");
$tn = file_get_contents("tnb.txt");
$ban = file_get_contents("ban.txt");
$exb = explode("\n",$ban);
$rembo ="637549705"; #ايديك#
$m = explode("\n",file_get_contents("member.txt"));
$m1 = count($m)-1;
if($message and !in_array($id, $m)){
file_put_contents("member.txt", $id."\n",FILE_APPEND);
 }
$j = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$id);
if($message && (strpos($j,'"status":"left"') or strpos($j,'"Bad Request: USER_ID_INVALID"') or strpos($j,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📮┇مرحبا بك عزيزي❗️
🗃┇لا تستطيع استخدام البوت❗️
🔬┇عليك الاشتراك في قناة البوت ❗️
📯┇القناة ~⪼ $ch ❗️
┄─┅═ـ═┅─┄
- بعد الاشتراك اضغط { /start }",
]);return false;}

if($text =="/start"and $tn =="on"and $id !=$rembo){
bot('sendmessage',[
'chat_id'=>$rembo,
'text'=>
"
لقد دخل شخص الى البوت 🔬
┄─┅═ـ═┅─┄
👨‍💼┊الاسم » ️ [$name](tg://user?id=$id)
🌀┊المعرف »  ️[@$user](tg://user?id=$id)
🏷┊الايدي » ️ [$id](tg://user?id=$id)
",
'parse_mode'=>"MarkDown",
]);
}
if($text =='#admin' and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎖¦ آهہ‌‏لآ عزيزي آلمـطـور 🍃
💰¦ آنتهہ‌‏ آلمـطـور آلآسـآسـي هہ‌‏نآ 🛠
...

🚸¦ تسـتطـيع‌‏ آلتحگم بگل آلآوآمـر آلمـمـوجودهہ‌‏ بآلگيبورد
⚖️¦ فقط آضـغط ع آلآمـر آلذي تريد تنفيذهہ‌‏",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"•وضع اشتراك اجباري💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك اجباري🔱",'callback_data'=>"dch"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"ايقاف البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
]
])
]);
}

if($data =='back'){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين ",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"•وضع اشتراك اجباري💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك اجباري🔱",'callback_data'=>"dch"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"ايقاف البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
]
])
]);
unlink("rembo.txt");
}
if($data =="ban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لاحظره🤩", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","ban");
}

if($text and $sajad =="ban" and $id ==$rembo){
file_put_contents("ban.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم حظرك من قبل المطور لايمكنك استخدام البوت😒",
]);
}

if($data =="unban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لالغاء حظره🔱", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","unban");
}
if($text and $sajad =="unban" and $id ==$rembo){
$bn = str_replace($text,'',$ban);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم الغاء حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("ban.txt",$bn);
unlink("rembo.txt");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم الغاء حظرك من البوت🤩",
]);
}
if($data =="ofbot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم اغلاق البوت✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("bot.txt","off");
}
$obot = file_get_contents("bot.txt");
if($data =="obot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم فتح البوت بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("bot.txt");
}
if($data =="send"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رسالتك📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","send");
} 
if($text and $sajad == "send" and $id == $rembo){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'-تم النشر بنجاح✔️',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('sendMessage', [
'chat_id'=>$m[$i],
'text'=>$text
]);
unlink("rembo.txt");
}
}
if($data =="forward"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي قم بتوجيه الرسالة✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","forward");
} 
if($text and $sajad == "forward" and $id == $rembo){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'تم التوجيه بنجاح🔰',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('forwardMessage', [
'chat_id'=>$m[$i],
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
unlink("rembo.txt");
}
}
if($data =="ach"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك 📮
مثل @h4ck3riraq
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("rembo.txt","ch");
} 
if($text and $sajad =="ch" and $id ==$rembo ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم وضع اشتراك اجباري😁", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
file_put_contents("ch.txt","$text");
unlink("rembo.txt");
} 
if($data == "m1"){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
عدد المشترڪين هو » $m1 «
        ",
        'show_alert'=>true,
]);
}
if($data =="dch"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"🔰تم حذف القناة بنجاح", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
unlink("ch.txt");
} 
if($data =="ons"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تفعيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("tnb.txt","on");
} 

if($data =="ofs"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تعطيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("tnb.txt");
} 

if($message and in_array($id, $exb)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"انت محظور من قبل المطور لايمكنك استخدام البوت📛",
]);return false;}

if($message and $obot =="off" and $id !=$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️┊نعتذر عزيزي المشترك
⚙┊حاليا البوت تحت التحديث
😻┊للمزيد تابع القناة @XTXTK
📝┊التاريخ:‹ $year/$month/$day
",
]);return false;}

 

if($text == "/start"){
if (!file_exists("data/$from_id/ali.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/ali.txt","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
    
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎭┊ مرحبا عزيزي المطور العربي
⚙┊ انا بوت انشاء ويب هوك الحديث 💯
📫┊ فقط كل ماهو عليك التاكد من صحة المعلومات للملف المراد ربطه للمزيد تابع القائمة
🔖┊ [XTXTK](https://t.me/XTXTK/1)",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[[ text =>"عمل ويب هوك"],[ text =>"معلومات التوكن"]],
	[[ text =>"حذف الويب"]]
	]
	])
	]);
	}
elseif($text == "الرجـــوع"){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/token.txt","no");
file_put_contents("data/$from_id/url.txt","no");
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"تم الرجوع للخلف ",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[[ text =>"عمل ويب هوك"],[ text =>"معلومات التوكن"]],
	[[ text =>"حذف الويب"]]
	]
	])
	]);
	}
//===================〇ᙢᗩᖇ ᕼᗩᔕᕼᙢ===============//
elseif($text == "عمل ويب هوك"){
     sendAction($chat_id, 'typing');
			file_put_contents("data/$from_id/ali.txt","to");
				bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"ارسل توكن بوتك",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"الرجـــوع"]
	],
	]
	])
	]);
	}
elseif($ali == "to"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "");
    } else{
    file_put_contents("data/$from_id/ali.txt","url");
    file_put_contents("data/$from_id/token.txt",$text);
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"ارسل رابط الملف للتفعيل",
  ]);
}
}
elseif($ali == "url"){
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text))
  {
  SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"هناك خطاء رسائل متعددة ",
  ]);
 }
 else {
 file_put_contents("data/$from_id/ali.txt","no");
 file_put_contents("data/$from_id/url.txt",$text);
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار الفحص.....",
  ]);
  sleep(1);
   	bot('editmessagetext',[
    'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
    'text'=>"جار التحظير تواني... ...",
  ]);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"🔘¦ انت متأكد من عمل ويب هوك للمعلومات التاليه :- 

💳¦ توكن البوت ↙️;
$to
💯¦ رابط الملف ↙️;

 $text

📡¦ للتأكيد ارسل الامر   ↙️; 
/WEBEHOOK",
  ]);
 }
}
elseif($text == "/WEBEHOOK" ){
if($to != "no"){
 	 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار التاكيد....... ",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"انتظر قليلا ......
",
  ]);
  file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
    sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"انتظر قليلا ...........
",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"تم عمل الويب بنجاح",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"عمل ويب هوك"],['text'=>"معلومات التوكن"]],
	[['text'=>"حذف الويب"]]
	]
	])
	]);
}

}
/////--------
elseif($text == "معلومات التوكن" ){
    file_put_contents("data/$from_id/ali.txt","token");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"ارسل توكن بوتك",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'الرجـــوع']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "token"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "لقد ارسلت التوكن بشكل غير صحيح 
.! الرجاء ارسال التوكن بشكل صحيح 📬");
    } else{
    file_put_contents("data/$from_id/ali.txt","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار الفحص اذاكان التوكن فعال",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"• معلومات 📬 التوكن هي 💬 •

• معرف البوت 💭 • @$un
• ايدي البوت 🔖 • $id
• اسم البوت 🌙 • $fr
• رابط الملف 💧•
$ur
",
  ]);
}
}
elseif($text == "حذف الويب" ){
    file_put_contents("data/$from_id/ali.txt","del");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"ارسل توكن البوت",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'الرجـــوع']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "del"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "لقد ارسلت التوكن بشكل غير صحيح 
.! الرجاء ارسال التوكن بشكل صحيح 📬");
    } else{
    file_put_contents("data/$from_id/ali.txt","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار التحقق من العمليه",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"يتم الان تهيئة البيانات",
  ]);
}
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"تم حذف رابط الويب للتوكن",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"تم العودة للصفحة السابقة",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"عمل ويب هوك"],['text'=>"معلومات التوكن"]],
	[['text'=>"حذف الويب"]]
	]
	])
	]);
}

 