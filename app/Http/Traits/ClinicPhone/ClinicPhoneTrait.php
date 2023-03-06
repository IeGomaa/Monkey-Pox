<?php

namespace App\Http\Traits\ClinicPhone;

trait ClinicPhoneTrait
{
    private function getClinicPhones()
    {
        return $this->clinicPhoneModel::with(['clinic'])->get();
    }

    private function findClinicPhone($id)
    {
        return $this->clinicPhoneModel::with(['clinic'])->find($id);
    }
}
