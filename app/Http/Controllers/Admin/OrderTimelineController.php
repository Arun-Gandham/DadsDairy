<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderTimeline;
use Illuminate\Http\Request;

class OrderTimelineController extends Controller
{
    public function destroy(OrderTimeline $timeline)
    {
        $timeline->delete();
        return back()->with('success', 'Timeline event deleted.');
    }

    public function edit(OrderTimeline $timeline)
    {
        return view('admin.orders.timeline_edit', compact('timeline'));
    }

    public function update(Request $request, OrderTimeline $timeline)
    {
        try {
            $request->validate([
                // Only require changed_at if state is completed
                'changed_at' => $request->state === 'completed' ? 'required|date' : 'nullable|date',
                'state' => 'required|in:in_progress,completed,cancelled',
                'note' => 'nullable|string|max:255',
            ]);

            $data = [
                'state' => $request->state,
                'note' => $request->note,
            ];
            if ($request->state === 'completed') {
                $data['changed_at'] = $request->changed_at;
            }
            $timeline->update($data);
            return redirect()->route('admin.orders.show', $timeline->order_id)->with('success', 'Timeline updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating timeline: ' . $e->getMessage());
        }
    }
}
