<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminNewsInterface;
use App\Http\Requests\Admin\News\CreateNewsRequest;
use App\Http\Requests\Admin\News\DeleteNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Http\Services\News\NewsDeleteImageService;
use App\Http\Services\News\NewsUploadImageService;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    private $newsInterface;
    public function __construct(AdminNewsInterface $interface)
    {
        $this->newsInterface = $interface;
    }

    public function index()
    {
        return $this->newsInterface->index();
    }

    public function create(CreateNewsRequest $request, NewsUploadImageService $service)
    {
        return $this->newsInterface->create($request, $service);
    }

    public function delete(DeleteNewsRequest $request, NewsDeleteImageService $service)
    {
        return $this->newsInterface->delete($request, $service);
    }

    public function update(UpdateNewsRequest $request)
    {
        return $this->newsInterface->update($request);
    }
}
