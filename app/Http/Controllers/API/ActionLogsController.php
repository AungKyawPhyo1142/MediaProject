<?php

namespace App\Http\Controllers\API;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActionLogsController extends Controller
{
    public function setActionLogs(Request $req){

        $data = [
            'user_id' => $req->user_id,
            'post_id' => $req->post_id
        ];
        ActionLog::create($data);

        $data = ActionLog::where('post_id',$req->post_id)->get();

        return response()->json([
            'message' => 'ActionLog created successfully!',
            'posts' => $data
        ]);

    }
}
