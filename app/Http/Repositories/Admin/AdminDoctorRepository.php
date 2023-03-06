<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminDoctorInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Doctor\DoctorTrait;
use App\Http\Traits\Redis\DoctorRedis;
use App\Models\Doctor;

class AdminDoctorRepository implements AdminDoctorInterface
{
    private $doctorModel;
    use ApiResponseTrait, DoctorRedis, DoctorTrait;
    public function __construct(Doctor $doctor)
    {
        $this->doctorModel = $doctor;
    }

    public function index()
    {
        $doctors = $this->getDoctorsFromRedis();
        $filtered = [];
        foreach ($doctors as $doctor) {
            $collection = collect($doctor);
            $filtered []= $collection->only(['id', 'name', 'image', 'highest_certificate', 'medical_syndicate_card', 'syndicate_number', 'town'])->where('status', 'avilable');
        }
        return $this->apiResponse(200, 'Doctors Data', null, $filtered);
    }

    public function create($request, $service, $medicalUploadService)
    {
        $doctorImage = $service->uploadImage($request->image);
        $cardImage = $medicalUploadService->uploadImage($request->medical_syndicate_card);
        $doctor = $this->doctorModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $doctorImage,
            'gender' => $request->gender,
            'highest_certificate' => $request->highest_certificate,
            'syndicate_number' => $request->syndicate_number,
            'town_id' => $request->town_id,
            'description' => $request->description,
            'medical_syndicate_card' => $cardImage,
            'status' => 'available'
        ]);
        $this->setDoctorsIntoRedis();
        return $this->apiResponse(200, 'Doctor Was Created', null, $doctor);
    }

    public function delete($request, $service)
    {
        $doctor = $this->findDoctors($request->id);
        $service->deleteImageInLocal($doctor->image);
        $doctor->delete();
        $this->setDoctorsIntoRedis();
        return $this->apiResponse(200, 'Doctor Was Deleted');
    }

    public function update($request, $service)
    {
        $doctor = $this->findDoctors($request->id);
        $imageName = $service->checkImage($request->image, $doctor);
        $doctor->update([
            'name' => $request->name ?? $doctor->name,
            'email' => $request->email ?? $doctor->email,
            'image' => $imageName,
            'gender' => $doctor->gender,
            'highest_certificate' => $request->highest_certificate ?? $doctor->highest_certificate,
            'syndicate_number' => $doctor->syndicate_number,
            'town_id' => $request->town_id ?? $doctor->town_id,
            'status' => $request->status,
            'description' => $request->description,
            'medical_syndicate_card' => $doctor->getRawOriginal('medical_syndicate_card'),
        ]);
        $this->setDoctorsIntoRedis();
        return $this->apiResponse(200, 'Doctor Was Updated');
    }
}
