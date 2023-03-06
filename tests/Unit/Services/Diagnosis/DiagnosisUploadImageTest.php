<?php

namespace Tests\Unit\Services\Diagnosis;

use App\Http\Services\Diagnosis\DiagnosisUploadImageService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DiagnosisUploadImageTest extends TestCase
{
    public function test_diagnosis_upload_image()
    {
        $image = UploadedFile::fake()->image('diagnosis.png');
        $service = $this->app->make(DiagnosisUploadImageService::class);
        $imageName = $service->uploadImage($image);
        $this->assertFileExists(public_path('uploaded/diagnosis/'. $imageName));
    }
}
