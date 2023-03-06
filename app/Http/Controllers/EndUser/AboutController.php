<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\AboutInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutInterface;
    public function __construct(AboutInterface $interface)
    {
        $this->aboutInterface = $interface;
    }

    public function index()
    {
        return $this->aboutInterface->index();
    }
}
