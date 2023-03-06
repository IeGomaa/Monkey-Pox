<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSymptomInterface;
use App\Http\Requests\Admin\Symptom\CreateSymptomRequest;
use App\Http\Requests\Admin\Symptom\DeleteSymptomRequest;
use App\Http\Requests\Admin\Symptom\UpdateSymptomRequest;

class AdminSymptomController extends Controller
{
    private $symptomInterface;
    public function __construct(AdminSymptomInterface $interface)
    {
        $this->symptomInterface = $interface;
    }

    public function index()
    {
        return $this->symptomInterface->index();
    }

    public function create(CreateSymptomRequest $request)
    {
        return $this->symptomInterface->create($request);
    }

    public function delete(deleteSymptomRequest $request)
    {
        return $this->symptomInterface->delete($request);
    }

    public function update(updateSymptomRequest $request)
    {
        return $this->symptomInterface->update($request);
    }
}
