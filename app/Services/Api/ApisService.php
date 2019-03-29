<?php

namespace App\Services\Api;

use App\Repositories\Api\ApisRepository;

class ApisService
{
	protected $apiRepo = null;

    public function __construct(ApisRepository $apiRepo)
    {
        $this->apiRepo = $apiRepo;
    }

	// 迴圈作法
	public function dealStairs($floor)
	{
		if ($floor < 3) {
			return $floor;
		}

		$params = [1, 2];

	    for ($i = 2; $i < $floor; $i++) {
	        $params[$i] = $params[$i - 1] + $params[$i - 2];
	    }

	    return $params[$floor - 1];
	}

	// 遞迴作法
	public function otherDealStairs($floor)
	{
		if ($floor < 3) {
			return $floor;
		}

		for ($i = 2; $i <= $floor ; $i++) {
			$method = $this->otherDealStairs($i - 1) + $this->otherDealStairs($i - 2);
		}

		return $method;
	}

	public function getChatRecords()
	{
		return $this->apiRepo->chatRecords();
	}

	public function postChatRecord($params)
	{
		return $this->apiRepo->createChatRecord($params);
	}

}