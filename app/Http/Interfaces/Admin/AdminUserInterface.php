<?php

namespace App\Http\Interfaces\Admin;

interface AdminUserInterface
{
    public function index();
    public function account();
    public function create($request);
    public function delete($request);
    public function update($request);
}
