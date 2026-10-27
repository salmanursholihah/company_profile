<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\AppNotification;
use App\Models\DeviceToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends ApiController
{
    // POST /api/v1/notifications/device-token
    public function registerToken(Request $request): JsonResponse
    {
        $data = $request->validate([
            'token'       => 'required|string|max:512',
            'platform'    => 'nullable|string|in:android,ios,web',
            'device_name' => 'nullable|string|max:100',
        ]);

        // Token yang sama bisa pindah ke akun lain (ganti akun di HP yang sama).
        DeviceToken::updateOrCreate(
            ['token' => $data['token']],
            [
                'user_id'      => $request->user()->id,
                'platform'     => $data['platform'] ?? null,
                'device_name'  => $data['device_name'] ?? null,
                'last_used_at' => now(),
            ]
        );

        return $this->ok(null, 'Perangkat terdaftar.');
    }

    // DELETE /api/v1/notifications/device-token
    public function removeToken(Request $request): JsonResponse
    {
        $data = $request->validate(['token' => 'required|string|max:512']);

        DeviceToken::where('user_id', $request->user()->id)->where('token', $data['token'])->delete();

        return $this->ok(null, 'Perangkat dihapus.');
    }

    // GET /api/v1/notifications?page=1
    public function index(Request $request): JsonResponse
    {
        $uid = $request->user()->id;

        $p = AppNotification::where('user_id', $uid)->latest('id')->paginate(30);

        return $this->ok(
            $p->getCollection()->map->toApi()->values(),
            null,
            200,
            [
                'current_page' => $p->currentPage(),
                'last_page'    => $p->lastPage(),
                'per_page'     => $p->perPage(),
                'total'        => $p->total(),
                'unread_count' => AppNotification::where('user_id', $uid)->whereNull('read_at')->count(),
            ]
        );
    }

    // GET /api/v1/notifications/unread-count
    public function unreadCount(Request $request): JsonResponse
    {
        return $this->ok([
            'unread_count' => AppNotification::where('user_id', $request->user()->id)->whereNull('read_at')->count(),
        ]);
    }

    // POST /api/v1/notifications/{id}/read
    public function markRead(Request $request, int $id): JsonResponse
    {
        AppNotification::where('user_id', $request->user()->id)
            ->where('id', $id)->whereNull('read_at')
            ->update(['read_at' => now()]);

        return $this->ok(null, 'Ditandai dibaca.');
    }

    // POST /api/v1/notifications/read-all
    public function markAllRead(Request $request): JsonResponse
    {
        AppNotification::where('user_id', $request->user()->id)
            ->whereNull('read_at')->update(['read_at' => now()]);

        return $this->ok(null, 'Semua ditandai dibaca.');
    }
}
