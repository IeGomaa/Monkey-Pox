<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\FaqInterface;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $faqInterface;
    public function __construct(FaqInterface $interface)
    {
        $this->faqInterface = $interface;
    }

    public function index()
    {
        return $this->faqInterface->index();
    }
}
