<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Contact\ContactTrait;
use Illuminate\Support\Facades\Redis;

trait ContactRedis
{
    use ContactTrait;
    private function setContactsIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('contacts', $this->getContacts());
    }

    private function getContactsFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('contacts'));
        if (empty($data)) {
            $data = $this->getContacts();
        }
        return $data;
    }
}
