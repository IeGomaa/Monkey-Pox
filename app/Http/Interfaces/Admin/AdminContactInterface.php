<?php

namespace App\Http\Interfaces\Admin;

interface AdminContactInterface
{
    public function index();
    public function delete($request);
}
