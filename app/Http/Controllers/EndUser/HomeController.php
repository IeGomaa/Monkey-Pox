<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HomeInterface;

class HomeController extends Controller
{
    private $homeInterface;
    public function __construct(HomeInterface $interface)
    {
        $this->homeInterface = $interface;
    }

    public function index()
    {
        return $this->homeInterface->index();
    }
}
