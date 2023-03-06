<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Contact;

class ContactRepository implements ContactInterface
{
    private $contactModel;
    use ApiResponseTrait;
    public function __construct(Contact $contact)
    {
        $this->contactModel = $contact;
    }

    public function create($request)
    {
        $this->contactModel::create($request->validated());
        return $this->apiResponse(200, 'Thank You For Communicating With Us');
    }
}
