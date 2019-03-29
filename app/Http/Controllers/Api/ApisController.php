<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Api\ApisService;
use Redis;

class ApisController extends Controller
{
	protected $apiService = null;

    public function __construct(ApisService $apiService)
    {
        $this->apiService = $apiService;
    }

    // 您正在爬樓梯，樓梯具有 n 層階梯，您可以一次爬 1 層階梯，或是一次爬 2 層階梯，請問 n 層階梯有多少種方法可以登頂？
    public function stairsProblem($floor = 1)
    {
    	// floor 層數, method 幾種方法
    	return response()->json([
    		'floor' => $floor,
    		'method' => $this->apiService->dealStairs($floor)
    	], 200);
    }

    public function getPublishNotify()
    {
        return response()->json($this->apiService->getChatRecords(), 200);
    }

    public function postPublishNotify(Request $request)
    {
        if ($request->username && $request->message) {
            $message = $this->apiService->postChatRecord($request->only('username', 'message'));
            Redis::publish('chat', json_encode($message));
            return response()->json($message, 200);
        }

        return response()->json([
            'result' => 1,
            'message' => 'Params Error'
        ], 422);
    }
}
