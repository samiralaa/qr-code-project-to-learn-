<?php

namespace App\Http\Controllers\Api\User\VCard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vcard\VcardRequest;
use App\Services\User\VCard\VCardService;

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
         if ($request->hasFile('image')) {
           
            $imagePath = $request->file('image')->store('vcards', 'public');
            $validated['image_path'] = $imagePath;
        }

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
