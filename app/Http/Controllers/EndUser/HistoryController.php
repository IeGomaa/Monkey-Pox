<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HistoryInterface;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    private $historyInterface;
    public function __construct(HistoryInterface $interface)
    {
        $this->historyInterface = $interface;
    }

    public function index()
    {
        return $this->historyInterface->index();
    }
}
