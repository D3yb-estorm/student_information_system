@extends('layouts.app')

@section('title', 'Audit Logs - Student Information System')

@section('content')
<div class="page-header">
    <h1>Audit Logs</h1>
</div>

@if ($auditLogs->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Staff ID</th>
                    <th>Action</th>
                    <th>Entity</th>
                    <th>Entity ID</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditLogs as $log)
                    <tr>
                        <td>{{ $log->timestamp->format('M d, Y H:i:s') }}</td>
                        <td>{{ $log->staff_id }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.75rem; border-radius: 4px; background: 
                                @if($log->action == 'created') #d4edda; color: #155724;
                                @elseif($log->action == 'updated') #d1ecf1; color: #0c5460;
                                @elseif($log->action == 'deleted') #f8d7da; color: #721c24;
                                @else #e2e3e5; color: #383d41; @endif">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>
                        <td>{{ $log->entity }}</td>
                        <td>{{ $log->entity_id }}</td>
                        <td>{{ Str::limit($log->details, 50) }}</td>
                        <td>
                            <a href="{{ route('audit-logs.show', $log->log_id) }}" class="btn btn-secondary" style="padding: 0.25rem 0.75rem; font-size: 0.875rem;">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $auditLogs->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No audit logs found.</p>
    </div>
@endif
@endsection
