<?php

namespace App\Http\Controllers\Api\VCard;

use Illuminate\Http\Request;
use App\Services\VcardService;
use App\Http\Controllers\Controller;

class VCardController extends Controller
{
    protected $service;

    public function __construct(VcardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllVcards());
    }

    public function show($id)
    {
        return response()->json($this->service->getVcardById($id));
    }

    public function store(VcardRequest $request)
    {
        return response()->json($this->service->createVcard($request->validated()));
    }

    public function update(VcardRequest $request, $id)
    {
        return response()->json($this->service->updateVcard($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json($this->service->deleteVcard($id));
    }
}
