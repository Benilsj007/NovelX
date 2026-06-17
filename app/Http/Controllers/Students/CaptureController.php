<?php
namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Str;

class CaptureController extends Controller
{
    public function capture(Request $request)
    {
        $url = $request->query('url');

        if (!$url) {
            return response()->json(['error' => 'URL is required']);
        }

        $fileName = Str::slug(parse_url($url, PHP_URL_HOST)) . '-' . time();

        
        $path = public_path('assets/captures');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        // 1. Screenshot
        $imagePath = $path . '/' . $fileName . '.png';
        Browsershot::url($url)
            ->setOption('args', ['--no-sandbox'])
            ->windowSize(1280, 720)
            ->save($imagePath);

        // 2. PDF
        $pdfPath = $path . '/' . $fileName . '.pdf';

        Browsershot::url($url)
            ->setOption('args', ['--no-sandbox'])
            ->format('A4')
            ->savePdf($pdfPath);

        return response()->json([
            'message' => 'Captured successfully',
            'image' => asset('assets/captures/' . $fileName . '.png'),
            'pdf' => asset('assets/captures/' . $fileName . '.pdf'),
        ]);
    }
}