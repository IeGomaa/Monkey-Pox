<?php

namespace Tests\Unit\Services\Diagnosis;

use App\Http\Services\Diagnosis\DiagnosisDeleteImageService;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class DiagnosisDeleteImageTest extends TestCase
{
    const PATH = 'uploaded/diagnosis/';
    public function test_diagnosis_delete_image_in_public_path()
    {
        $image = File::fake()->create('diagnosis')->move(public_path(self::PATH));
        $service = $this->app->make(DiagnosisDeleteImageService::class);
        $service->deleteImageInLocal(self::PATH . $image->getFilename());
        $this->assertFileDoesNotExist(public_path(self::PATH . $image->getFilename()));
    }
}
