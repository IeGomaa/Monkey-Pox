<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCertificationInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Certification\CertificationTrait;
use App\Models\Certification;

class AdminCertificationRepository implements AdminCertificationInterface
{
    private $certificationModel;
    use ApiResponseTrait, CertificationTrait;
    public function __construct(Certification $certification)
    {
        $this->certificationModel = $certification;
    }

    public function index()
    {
        $certifications = $this->getCertifications();
        return $this->apiResponse(200, 'Certification Data', null, $certifications);
    }

    public function create($request)
    {
        $certification = $this->certificationModel::create([
            'certificate' => $request->certificate,
            'place' => $request->place,
            'date' => $request->date,
            'doctor_id' => $request->doctor_id
        ]);
        return $this->apiResponse(200, 'Certification Was Created', null, $certification);
    }

    public function delete($request)
    {
        $this->findCertification($request->id)->delete();
        return $this->apiResponse(200, 'Certification Was Deleted');
    }

    public function update($request)
    {
        $certificate = $this->findCertification($request->id);
        $certificate->update([
            'certificate' => $request->certificate ?? $certificate->certificate,
            'place' => $request->place ?? $certificate->place,
            'date' => $request->date ?? $certificate->date,
            'doctor_id' => $request->doctor_id
        ]);
        return $this->apiResponse(200, 'Certification Was Updated');
    }
}
