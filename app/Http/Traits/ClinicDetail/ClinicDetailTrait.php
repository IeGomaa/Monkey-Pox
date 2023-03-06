<?php

namespace App\Http\Traits\ClinicDetail;

trait ClinicDetailTrait
{
    private function getClinicDetails()
    {
        return $this->clinicDetailModel::with(['clinic'])->get();
    }

    private function findClinicDetail($id)
    {
        return $this->clinicDetailModel::with(['clinic'])->find($id);
    }
}
