<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',          // Judul event
        'description',    // Deskripsi event
        'location',       // Lokasi event
        'start_date',     // Tanggal mulai event
        'end_date',       // Tanggal selesai event
        'status',         // Status event (upcoming, ongoing, completed)
        'created_by',     // ID user yang membuat event
        'image',          // Foto event
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',  // Cast start_date ke format datetime
        'end_date' => 'datetime',    // Cast end_date ke format datetime
    ];

    /**
     * Get the user that created the event.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id');  // 'user_id' adalah kolom yang menghubungkan dengan User
    }

}
