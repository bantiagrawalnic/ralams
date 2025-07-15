<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model {
    use HasFactory;

    protected $fillable = [
        'application_id',
        'ralams_id',
        'activity',
        'activity_details',
    ];

    // ================= Relations =================

    public function user() {
        return $this->belongsTo(User::class, 'ralams_id', 'ralams_id');
    }

    /**
     * Application relation — only if Application model exists
     */
    // public function application() {
    //     return $this->belongsTo(Application::class, 'application_id');
    // }
}
