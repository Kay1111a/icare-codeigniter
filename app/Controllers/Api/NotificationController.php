<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\NotificationLog;
use Illuminate\Http\Request;

class NotificationController extends BaseController
{
    public function index(Request $request)
    {
        $page = $request->user()->notifications()->latest()->paginate(20);

        // unread_count is the real total (not just the 20 on this page) so the bell badge is right.
        return response()->json(array_merge($page->toArray(), [
            'unread_count' => $request->user()->unreadNotifications()->count(),
        ]));
    }

    public function markRead(Request $request, string $id)
    {
        $notification = $request->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return response()->json(['message' => 'Notification marked as read.']);
    }

    public function markAllRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return response()->json(['message' => 'All notifications marked as read.']);
    }

    public function logs(Request $request)
    {
        $query = NotificationLog::where('user_id', $request->user()->id)
            ->when($request->status,  fn($q) => $q->where('status', $request->status))
            ->when($request->channel, fn($q) => $q->where('channel', $request->channel));

        return response()->json($query->latest()->paginate(20));
    }
}