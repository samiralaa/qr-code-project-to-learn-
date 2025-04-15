namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\File;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        // Retrieve basic data from the request
        $type = $request->type;
        $phone = $request->phone;
        $email = $request->email;
        $name = $request->name;
        $jobTitle = $request->job_title;
        $location = $request->location;
    
        // If company, use Webenia links; else use submitted ones
        if ($type === 'company') {
            $facebook = 'http://facebook.com/webenia';
            $twitter = 'https://www.instagram.com/webeniaagency/';
            $linkedin = 'https://www.linkedin.com/company/webenia/posts/?feedView=all';
            $website = 'https://webenia.com/';
        } else {
            $facebook = $request->facebook;
            $twitter = $request->twitter;
            $linkedin = $request->linkedin;
            $website = $request->website; // Use submitted website if available
        }
    
        // Create vCard
        $contactInfo = "BEGIN:VCARD\n";
        $contactInfo .= "VERSION:3.0\n";
    
        if ($name) $contactInfo .= "FN:$name\n";
        if ($jobTitle) $contactInfo .= "TITLE:$jobTitle\n";
        if ($phone) $contactInfo .= "TEL:$phone\n";
        if ($email) $contactInfo .= "EMAIL:$email\n";
    
        if ($location) {
            $addressParts = explode(',', $location);
            $street = trim($addressParts[0] ?? '');
            $city = trim($addressParts[1] ?? '');
            $state = trim($addressParts[2] ?? '');
            $country = trim($addressParts[3] ?? '');
        
            // Human-readable location (used for display)
            $contactInfo .= "LABEL:$location\n";
        
            // Structured address (used for importing into contacts)
            $contactInfo .= "ADR;TYPE=Location:;;$street;$city;$state;;$country\n";
        }
        
        // Add social media links
        if ($facebook) $contactInfo .= "URL;TYPE=Facebook:$facebook\n";
        if ($twitter) $contactInfo .= "URL;TYPE=Twitter:$twitter\n";
        if ($linkedin) $contactInfo .= "URL;TYPE=LinkedIn:$linkedin\n";
        
        // Only add website if jobTitle is provided
        if ($jobTitle && $website) {
            $contactInfo .= "URL:$website\n";
        }
    
        $contactInfo .= "END:VCARD\n";
    
        // Generate QR code
        $qrCode = new QrCode($contactInfo);
        $writer = new PngWriter();
    
        // Create directory if not exists
        $qrCodePath = public_path('qrcodes');
        if (!File::exists($qrCodePath)) {
            File::makeDirectory($qrCodePath, 0755, true);
        }
    
        // Save file
        $fileName = $request->name . '_contact_qrcode_' . uniqid() . '.png';
        $filePath = $qrCodePath . '/' . $fileName;
    
        $writer->write($qrCode)->saveToFile($filePath);
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
