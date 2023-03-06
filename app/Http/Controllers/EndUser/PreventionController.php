<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\PreventionInterface;

class PreventionController extends Controller
{
    private $preventionInterface;
    public function __construct(PreventionInterface $interface)
    {
        $this->preventionInterface = $interface;
    }

    public function index()
    {
        return $this->preventionInterface->index();
    }
}
