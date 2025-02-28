<?php

namespace App\Http\Controllers\Api\Package;

use Illuminate\Http\Request;


use App\Services\Package\PackageService;
use App\Http\Requests\Packages\PackagesRequest;

class PackageController
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function index()
    {

        return response()->json($this->packageService->getAllPackages());
    }

    public function show($id)
    {
        return response()->json($this->packageService->getPackageById($id));
    }

    public function store(PackagesRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique filename and store the file
            $imagePath = $image->store('images/packages', 'public');

            // Save image path
            $data['image'] = $imagePath;
        }

        // Create package using the service
        $package = $this->packageService->createPackage($data);

        return response()->json([
            'message' => 'Package created successfully!',
            'package' => $package
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric',
        ]);

        return response()->json($this->packageService->updatePackage($id, $data));
    }

    public function destroy($id)
    {
        return response()->json($this->packageService->deletePackage($id));
    }
}
