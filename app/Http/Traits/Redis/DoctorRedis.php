<?php

namespace App\Http\Traits\Redis;

use App\Models\Doctor;
use Illuminate\Support\Facades\Redis;

trait DoctorRedis
{
    private function setDoctorsIntoRedis()
    {
        $redis = Redis::connection();
        $doctors = Doctor::with(['certificates', 'awards', 'clinics', 'clinics.clinicDetails', 'clinics.clinicPhones'])->get();
        $redis->set('doctors', $doctors);
    }

    private function getDoctorsFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('doctors'));
        if (empty($data)) {
            $data = Doctor::with(['certificates', 'awards', 'clinics', 'clinics.clinicDetails', 'clinics.clinicPhones'])->get();
        }
        return $data;
    }
}
