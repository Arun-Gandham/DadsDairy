<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // ...existing admin routes...
    Route::delete('order-timelines/{timeline}', [\App\Http\Controllers\Admin\OrderTimelineController::class, 'destroy'])->name('admin.order-timelines.destroy');
    Route::get('order-timelines/{timeline}/edit', [\App\Http\Controllers\Admin\OrderTimelineController::class, 'edit'])->name('admin.order-timelines.edit');
    Route::put('order-timelines/{timeline}', [\App\Http\Controllers\Admin\OrderTimelineController::class, 'update'])->name('admin.order-timelines.update');
});
