<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\File;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        // Retrieve data from the request
        $phone = $request->phone;
        $email = $request->email;
        $name = $request->name;
        $jobTitle = $request->job_title; // Added job title
        $location = $request->location;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $linkedin = $request->linkedin;

        // Format the data into a vCard string
        $contactInfo = "BEGIN:VCARD\n";
        $contactInfo .= "VERSION:3.0\n";

        if ($name) {
            $contactInfo .= "FN:$name\n";
        }
        if ($jobTitle) { // Add job title to vCard
            $contactInfo .= "TITLE:$jobTitle\n";
        }
        if ($phone) {
            $contactInfo .= "TEL:$phone\n";
        }
        if ($email) {
            $contactInfo .= "EMAIL:$email\n";
        }
        if ($location) {
            $addressParts = explode(',', $location);
            $street = trim($addressParts[0] ?? '');
            $city = trim($addressParts[1] ?? '');
            $state = trim($addressParts[2] ?? '');
            $country = trim($addressParts[3] ?? '');
            $contactInfo .= "ADR;TYPE=HOME:;;$street;$city;$state;;$country\n";
        }
        if ($facebook) {
            $contactInfo .= "URL;TYPE=Facebook:$facebook\n";
        }
        if ($twitter) {
            $contactInfo .= "URL;TYPE=Twitter:$twitter\n";
        }
        if ($linkedin) {
            $contactInfo .= "URL;TYPE=LinkedIn:$linkedin\n";
        }

        $contactInfo .= "END:VCARD\n";

        // Create the QR code instance
        $qrCode = new QrCode($contactInfo);
        $writer = new PngWriter();

        // Define the directory for saved QR codes
        $qrCodePath = public_path('qrcodes');
        if (!File::exists($qrCodePath)) {
            File::makeDirectory($qrCodePath, 0755, true);
        }


        // Generate a unique filename for the QR code
        $fileName = $request->name . '_contact_qrcode_' . uniqid() . '.png';
        $filePath = $qrCodePath . '/' . $fileName;

        // Save the QR code as a PNG file
        $writer->write($qrCode)->saveToFile($filePath);

        // Return the file as a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
