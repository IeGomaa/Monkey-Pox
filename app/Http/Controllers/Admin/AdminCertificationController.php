<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCertificationInterface;
use App\Http\Requests\Admin\Certification\CreateCertificationRequest;
use App\Http\Requests\Admin\Certification\DeleteCertificationRequest;
use App\Http\Requests\Admin\Certification\UpdateCertificationRequest;

class AdminCertificationController extends Controller
{
    private $certificationInterface;
    public function __construct(AdminCertificationInterface $interface)
    {
        $this->certificationInterface = $interface;
    }

    public function index()
    {
        return $this->certificationInterface->index();
    }

    public function create(CreateCertificationRequest $request)
    {
        return $this->certificationInterface->create($request);
    }

    public function delete(DeleteCertificationRequest $request)
    {
        return $this->certificationInterface->delete($request);
    }

    public function update(UpdateCertificationRequest $request)
    {
        return $this->certificationInterface->update($request);
    }
}
