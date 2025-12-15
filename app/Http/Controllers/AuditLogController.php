<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuditLogController extends Controller
{
    /**
     * Display a listing of audit logs.
     */
    public function index(): View
    {
        $auditLogs = AuditLog::orderBy('timestamp', 'desc')->paginate(15);
        return view('audit-logs.index', compact('auditLogs'));
    }

    /**
     * Display the specified audit log.
     */
    public function show(AuditLog $auditLog): View
    {
        return view('audit-logs.show', compact('auditLog'));
    }

    /**
     * Delete old audit logs (for cleanup)
     */
    public function destroy(AuditLog $auditLog)
    {
        $auditLog->delete();
        return redirect()->route('audit-logs.index')->with('success', 'Audit log deleted successfully.');
    }
}
