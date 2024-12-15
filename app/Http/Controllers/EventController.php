<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Menampilkan daftar event dengan opsi filter berdasarkan kategori (misalnya status)
    public function index(Request $request)
    {
        $status = $request->query('status'); // Mendapatkan status dari query parameter (misalnya "active", "completed", dll)

        $events = Event::query()
            ->when($status, function ($query, $status) {
                $query->where('status', $status); // Filter event berdasarkan status
            })
            ->with(['createdBy:id,name']) // Mengambil relasi createdBy dengan hanya id dan name (misalnya pengelola event)
            ->get()
            ->makeHidden('created_by'); // Menyembunyikan kolom created_by jika tidak dibutuhkan

        return response()->json($events);
    }

    // Menampilkan detail event berdasarkan ID
    public function show($id)
    {
        $event = Event::find($id); // Mencari event berdasarkan ID

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404); // Jika event tidak ditemukan
        }

        // Menangani field image jika diperlukan
        $image = is_string($event->image) ? json_decode($event->image, true) : $event->image;
        $event->image = $image;

        $event->makeHidden('created_by'); // Menyembunyikan kolom created_by

        return response()->json(['event' => $event]); // Mengembalikan response event
    }
}
