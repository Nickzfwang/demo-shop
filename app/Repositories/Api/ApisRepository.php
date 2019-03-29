<?php

namespace App\Repositories\Api;

use App\Entities\ChatRecord;

class ApisRepository
{
	public function chatRecords()
	{
		return ChatRecord::all();
	}

	public function createChatRecord($params)
	{
		return ChatRecord::create($params);
	}
}