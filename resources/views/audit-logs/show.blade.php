@extends('layouts.app')

@section('title', 'Audit Log Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Audit Log Details</h1>
    <div class="btn-group">
        <form action="{{ route('audit-logs.destroy', $auditLog->log_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('audit-logs.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <div class="detail-row">
        <label>Log ID:</label>
        <span>{{ $auditLog->log_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Timestamp:</label>
        <span>{{ $auditLog->timestamp->format('M d, Y H:i:s') }}</span>
    </div>
    
    <div class="detail-row">
        <label>Staff ID:</label>
        <span>{{ $auditLog->staff_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Action:</label>
        <span>
            <span style="padding: 0.25rem 0.75rem; border-radius: 4px; background: 
                @if($auditLog->action == 'created') #d4edda; color: #155724;
                @elseif($auditLog->action == 'updated') #d1ecf1; color: #0c5460;
                @elseif($auditLog->action == 'deleted') #f8d7da; color: #721c24;
                @else #e2e3e5; color: #383d41; @endif">
                {{ ucfirst($auditLog->action) }}
            </span>
        </span>
    </div>
    
    <div class="detail-row">
        <label>Entity:</label>
        <span>{{ $auditLog->entity }}</span>
    </div>
    
    <div class="detail-row">
        <label>Entity ID:</label>
        <span>{{ $auditLog->entity_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Details:</label>
        <span style="white-space: pre-wrap; word-break: break-word;">{{ $auditLog->details }}</span>
    </div>
</div>
@endsection
