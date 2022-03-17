<?php
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

Route::get('/test', function (){



    //getting channel id
    $apiKey = '5167573068:AAF3NvUL10Nm_PBidgfGR1Ufq4TsaNPTHJM'; // Put your bot's API key here
    $apiURL = 'https://api.telegram.org/bot' . $apiKey . '/';



    $client = new \GuzzleHttp\Client( array( 'base_uri' => $apiURL,'verify'=>false ) );

    $response = $client->get( 'getUpdates' );

    $updates = json_decode( $response->getBody() );

 //   dd($updates,  $apiURL);

//    sending messages
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001568584819'),
        'parse_mode' => 'HTML',
        'text' => 'test'
    ]);
   // dd(123);
    $client = new \GuzzleHttp\Client([
        'verify' => false
    ]);

});
