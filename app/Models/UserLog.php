<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model {
    use HasFactory;

    protected $fillable = [
        'application_id',
        'ralams_id',
        'ipaddress',
        'macaddress',
        'login_time',
        'logout_time',
    ];

    // ================= Relations =================

    /**
     * Get the user associated with this log via ralams_id
     */
    public function user() {
        return $this->belongsTo(User::class, 'ralams_id', 'ralams_id');
    }

    /**
     * (Optional future use)
     */
    // public function application() {
    //     return $this->belongsTo(Application::class, 'application_id');
    // }
}
