<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use PDF;

class TemplateController extends Controller
{
    // Show a list of all templates
    public function index()
    {
        $templates = Template::all();
        return view('backend.templates.index', compact('templates'));
    }

    // Upload a new template
    public function upload(Request $request)
    {
        $request->validate([
            'template_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'template_name' => 'required|string|max:255',
        ]);

        // Handle the file upload
        $file = $request->file('template_file');
        $filePath = $file->store('templates', 'public'); 

        // Save template information to the database
        Template::create([
            'name' => $request->input('template_name'),
            'path' => $filePath,
        ]);

        return redirect()->route('admin.templates.index')->with('success', 'Template uploaded successfully!');
    }

    // Show the form for editing a specific template
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('backend.templates.edit', compact('template'));
    }

    // Preview a specific template and its generated certificate
    public function preview($id)
    {
        $template = Template::findOrFail($id);
        $certificate = Certificate::where('template_id', $id)->first(); 

        return view('backend.templates.preview', [
            'template' => $template,
            'certificate' => $certificate,
        ]);
    }

    // Update a specific template

    // Delete a specific template
    public function destroy($id)
    {
        $template = Template::findOrFail($id);

        if ($template->path) {
            Storage::disk('public')->delete($template->path);
        }

        $template->delete();

        return redirect()->route('admin.templates.index')->with('success', 'Template deleted successfully.');
    }

    // Generate a certificate from a specific template
    public function generate(Request $request)
    {
        $request->validate([
            'template_id' => 'required|exists:templates,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'id_number' => 'required|string',
            'signature' => 'nullable|mimes:jpeg,png',
        ]);

        $template = Template::findOrFail($request->input('template_id'));
        $signaturePath = null;

        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('signatures', 'public');
        }

        $pdf = PDF::loadView('certificates.template', [
            'template' => $template,
            'user' => $request->only('name', 'surname', 'id_number'),
            'signature' => $signaturePath ? Storage::disk('public')->url($signaturePath) : null,
        ]);

        $pdfPath = 'certificates/' . time() . '.pdf';
        $pdf->save(storage_path('app/public/' . $pdfPath));

        Certificate::create([
            'user_name' => $request->input('name'),
            'user_surname' => $request->input('surname'),
            'user_id_number' => $request->input('id_number'),
            'template_id' => $request->input('template_id'),
            'file_path' => $pdfPath,
        ]);

        return redirect()->route('admin.templates.preview', ['id' => $request->input('template_id')])
                         ->with('success', 'Certificate generated successfully!');
    }
}
