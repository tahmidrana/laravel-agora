<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Services\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;

class AgoraVideoController extends Controller
{
    public function index ()
    {
        // fetch all users apart from the authenticated user
        // $users = User::where('id', '<>', auth()->id())->get();

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');
        // $channelName = $request->channelName;
        $channelName = 'rand-ch-name-ta';
        $user = auth()->user()->name;
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $uid = rand(999, 1999);

        // $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);
        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);

        return view('agora-chat', compact(
            'appID', 'channelName', 'token', 'uid'
        ));
    }

    public function token (Request $request)
    {
        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');
        $channelName = $request->channelName;
        $user = auth()->user()->name;
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        return $token;
    }

    public function callUser (Request $request)
    {
        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = auth()->id();

        // broadcast(new MakeAgoraCall($data))->toOthers();
    }
}
