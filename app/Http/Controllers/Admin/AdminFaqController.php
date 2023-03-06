<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminFaqInterface;
use App\Http\Requests\Admin\Faq\CreateFaqRequest;
use App\Http\Requests\Admin\Faq\DeleteFaqRequest;
use App\Http\Requests\Admin\Faq\UpdateFaqRequest;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    private $faqInterface;
    public function __construct(AdminFaqInterface $interface)
    {
        $this->faqInterface = $interface;
    }

    public function index()
    {
        return $this->faqInterface->index();
    }

    public function create(CreateFaqRequest $request)
    {
        return $this->faqInterface->create($request);
    }

    public function delete(DeleteFaqRequest $request)
    {
        return $this->faqInterface->delete($request);
    }

    public function update(UpdateFaqRequest $request)
    {
        return $this->faqInterface->update($request);
    }
}
