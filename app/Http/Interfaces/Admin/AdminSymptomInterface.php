<?php

namespace App\Http\Interfaces\Admin;

interface AdminSymptomInterface
{
    public function index();
    public function create($request);
    public function delete($request);
    public function update($request);
}
