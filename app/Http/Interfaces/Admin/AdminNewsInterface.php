<?php

namespace App\Http\Interfaces\Admin;

interface AdminNewsInterface
{
    public function index();
    public function create($request, $service);
    public function delete($request, $service);
    public function update($request);
}
