<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\NewsInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsInterface;
    public function __construct(NewsInterface $interface)
    {
        $this->newsInterface = $interface;
    }

    public function index()
    {
        return $this->newsInterface->index();
    }
}
