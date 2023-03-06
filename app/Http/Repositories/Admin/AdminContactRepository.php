<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Contact\ContactTrait;
use App\Http\Traits\Redis\ContactRedis;
use App\Models\Contact;

class AdminContactRepository implements AdminContactInterface
{
    private $contactModel;
    use ContactRedis, ApiResponseTrait;
    public function __construct(Contact $contact)
    {
        $this->contactModel = $contact;
    }

    public function index()
    {
        $contacts = $this->getContactsFromRedis();
        return $this->apiResponse(200, 'Contacts Data', null, $contacts);
    }

    public function delete($request)
    {
        $this->findContact($request->id)->delete();
        $this->setContactsIntoRedis();
        return $this->apiResponse(200, 'Contact Was Deleted');
    }
}
