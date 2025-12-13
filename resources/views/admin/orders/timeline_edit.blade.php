@extends('admin.layouts.app')

@section('title', 'Edit Timeline Event')

@section('content')
<h1>Edit Timeline Event</h1>
<form action="{{ route('admin.order-timelines.update', $timeline) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="{{ $timeline->status }}" required readonly>
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">State</label>
        <select class="form-select" id="state" name="state" required>
            <option value="in_progress" {{ $timeline->state === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $timeline->state === 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ $timeline->state === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="changed_at" class="form-label">Date & Time</label>
        <input type="datetime-local" class="form-control" id="changed_at" name="changed_at" value="{{ old('changed_at', $timeline->changed_at ? $timeline->changed_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" required>
    </div>
    <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <input type="text" class="form-control" id="note" name="note" value="{{ old('note', $timeline->note) }}" maxlength="255">
    </div>
    <button type="submit" class="btn btn-primary">Update Timeline Event</button>
    <a href="{{ route('admin.orders.show', $timeline->order_id) }}" class="btn btn-secondary ms-2">Cancel</a>
</form>
@endsection