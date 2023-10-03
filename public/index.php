<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use App\Models\User;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);

//tg bot


//$url="https://api.telegram.org/bot5816258297:AAHF1MzYODHlLR2rIX2ktL0gNSXT5HcRMs8/getUpdates";
//
//$sendMessageUrl="https://api.telegram.org/bot5816258297:AAHF1MzYODHlLR2rIX2ktL0gNSXT5HcRMs8/sendMessage";
//
//$_url=$url;
//
//$lastUpdate=null;
//
////$users=\Illuminate\Support\Facades\DB::table('users')->latest()->get();
//
//do {
//    if (null !== $lastUpdate) {
//        $_url = $url . '?offset=' . $lastUpdate;
//    }
//
//    $responsetg=json_decode(file_get_contents($_url), true);
//
//    foreach ($responsetg['result'] as $result) {
//        if ($lastUpdate === $result['update_id']) {
//            continue;
//        }
//        $lastUpdate = $result['update_id'];
//
//        $messageId = $result['message']['message_id'];
//        $chatId = $result['message']['chat']['id'];
//        $text = $result['message']['text'] ?? null;
//
//        echo sprintf("Message: %s\nChatId: %s\nText: %s\n", $messageId, $chatId, $text);
//        echo sprintf("Last Update : %s\n\n", $lastUpdate);
//
//        switch ($text)
//        {
//            case '/start';
//                $responsetg=[
//                    'chat_id'=>$chatId,
//                    'text'=>('
//                    Привіт, я телеграм бот створений для диплому
//                    '),
//                    'reply_to_message_id'=>$messageId,
//                ];
//                break;
//
//            case 'админ';
//                $responsetg=[
//                    'chat_id'=>$chatId,
//                    'text'=>('
//                    Кількість користувачів: 2
//                    '),
//                    'reply_to_message_id'=>$messageId,
//                ];
//                break;
//
//            case 'привет';
//                $responsetg=[
//                    'chat_id'=>$chatId,
//                    'text'=>('Привіт'),
//                    'reply_to_message_id'=>$messageId,
//                ];
//                break;
//
//            default:
//                $responsetg=[
//                    'chat_id'=>$chatId,
//                    'text'=>mb_strtoupper($text),
//                    'reply_to_message_id'=>$messageId,
//                ];
//                break;
//        }
//
//        file_get_contents($sendMessageUrl . '?' . http_build_query($responsetg));
//    }
//
//    sleep(1);
//
//} while(true);
