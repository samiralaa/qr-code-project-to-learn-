<?php

namespace App\Http\Controllers\Api\User\VCard;

use App\DTOs\VCardDTO;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Vcard\VcardRequest;
use App\Services\User\VCard\VCardService;

class VCardController extends Controller
{
    protected $service;

    public function __construct(VCardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAllVcards(Auth::id());
    }

    public function store(VcardRequest $request)
    {
        return response()->json("test");
        $dto = new VCardDTO(...$request->validated(), Auth::id());
        return $this->service->createVcard($dto);
    }
}
