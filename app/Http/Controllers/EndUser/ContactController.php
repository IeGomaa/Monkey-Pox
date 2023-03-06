<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Requests\EndUser\Contact\CreateContactRequest;

class ContactController extends Controller
{
    private $contactInterface;
    public function __construct(ContactInterface $interface)
    {
        $this->contactInterface = $interface;
    }

    public function create(CreateContactRequest $request)
    {
        return $this->contactInterface->create($request);
    }
}
