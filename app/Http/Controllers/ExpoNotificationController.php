<?php

namespace App\Http\Controllers;

use App\Models\ExpoNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExpoNotificationController extends Controller
{
    public function storeToken(Request $request)
    {
        $data = [
            "expoToken" => $request["expoToken"],
            "deviceName" => $request["deviceName"]
        ];

        $token = ExpoNotification::create($data);
        return response()->json($token);
    }

    public function send(Request $request)
    {
        $tokens = ExpoNotification::all();
        foreach ($tokens as $token) {
            $expoTokens[] = $token->expoToken;
        }
        $response = Http::post('https://exp.host/--/api/v2/push/send', [
            "to" => $expoTokens,
            "sound" => "default",
            "title" => $request["title"],
            "body" => $request["body"],
            "badge"=>1,
            'sticky'=>true
        ]);
        return $response;
    }
}
