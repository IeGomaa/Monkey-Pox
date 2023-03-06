<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminHistoryInterface;
use App\Http\Requests\Admin\History\CreateHistoryRequest;
use App\Http\Requests\Admin\History\DeleteHistoryRequest;
use App\Http\Requests\Admin\History\UpdateHistoryRequest;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    private $historyInterface;
    public function __construct(AdminHistoryInterface $interface)
    {
        $this->historyInterface = $interface;
    }

    public function index()
    {
        return $this->historyInterface->index();
    }

    public function create(CreateHistoryRequest $request)
    {
        return $this->historyInterface->create($request);
    }

    public function delete(DeleteHistoryRequest $request)
    {
        return $this->historyInterface->delete($request);
    }

    public function update(UpdateHistoryRequest $request)
    {
        return $this->historyInterface->update($request);
    }
}
