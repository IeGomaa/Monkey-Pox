<?php

namespace App\Http\Interfaces\Admin;

interface AdminPreventionInterface
{
    public function index();
    public function create($request);
    public function delete($request);
    public function update($request);
}
