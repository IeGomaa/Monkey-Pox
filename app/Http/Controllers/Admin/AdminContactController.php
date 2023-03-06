<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Requests\Admin\Contact\ContactDeleteRequest;

class AdminContactController extends Controller
{
    private $contactInterface;
    public function __construct(AdminContactInterface $interface)
    {
        $this->contactInterface = $interface;
    }

    public function index()
    {
        return $this->contactInterface->index();
    }

    public function delete(ContactDeleteRequest $request)
    {
        return $this->contactInterface->delete($request);
    }
}
