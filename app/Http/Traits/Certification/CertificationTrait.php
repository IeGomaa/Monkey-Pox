<?php

namespace App\Http\Traits\Certification;

trait CertificationTrait
{
    private function getCertifications()
    {
        return $this->certificationModel::with('doctor')->get();
    }

    private function findCertification($id)
    {
        return $this->certificationModel::with('doctor')->find($id);
    }
}
