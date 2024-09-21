<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Template;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use PDF; // Assuming you're using a PDF library like dompdf

class CertificateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'certificate' => 'required|file|mimes:pdf|max:2048', // Adjust validation rules as needed
        ]);

        try {
            // Generate a filename or use a unique name for the file
            $filename = uniqid() . '.pdf';

            // Attempt to save the file
            $path = $request->file('certificate')->storeAs('certificates', $filename, 'public');

            // Your additional logic, e.g., saving the path to the database

            return redirect()->back()->with('success', 'Certificate uploaded successfully!');
        } catch (\Exception $e) {
            // Log the error and return an appropriate response
            \Log::error('Failed to save the certificate: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to save the certificate.']);
        }
    }

    public function generate(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'template_id' => 'required|exists:templates,id',
        'name' => 'required|string',
        'surname' => 'required|string',
        'id_number' => 'required|string',
        'signature' => 'nullable|mimes:jpeg,png',
    ]);

    // Find the template
    $template = Template::findOrFail($validated['template_id']);
    $signaturePath = null;

    // Handle file upload for the signature if present
    if ($request->hasFile('signature')) {
        $signaturePath = $request->file('signature')->store('signatures', 'public');
    }

    // Generate the PDF
    $pdf = PDF::loadView('certificates.template', [
        'template' => $template,
        'user' => $validated,
        'signature' => $signaturePath ? Storage::disk('public')->url($signaturePath) : null,
    ]);

    // Define the path for the generated PDF
    $pdfPath = 'certificates/' . time() . '.pdf';
    $pdf->save(storage_path('app/public/' . $pdfPath));

    // Save certificate data to the database
    $certificate = Certificate::create([
        'name' => $validated['name'],
        'surname' => $validated['surname'],
        'id_number' => $validated['id_number'],
        'template_id' => $validated['template_id'],
        'pdf_path' => $pdfPath,
    ]);

    // Redirect to the preview page with the generated certificate
    return redirect()->route('admin.templates.preview', ['id' => $certificate->template_id])
                     ->with('success', 'Certificate generated successfully.');
}

}
