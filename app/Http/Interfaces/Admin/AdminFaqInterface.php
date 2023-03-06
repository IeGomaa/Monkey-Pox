<?php

namespace App\Http\Interfaces\Admin;

interface AdminFaqInterface
{
    public function index();
    public function create($request);
    public function delete($request);
    public function update($request);
}
