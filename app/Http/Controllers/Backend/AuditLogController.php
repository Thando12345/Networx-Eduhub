<?php
// app/Http/Controllers/Backend/AuditLogController.php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::with('admin')->get();
        return view('backend.audit-logs.index', compact('logs'));
    }
}
