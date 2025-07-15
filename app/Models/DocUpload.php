<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocUpload extends Model {
    use HasFactory;

    protected $fillable = [
        'application_id',
        'ralams_id',
        'document_id',
        'document_file',
        'is_active',
        'deleted_at',
    ];

    // ================= Relations =================

    public function user() {
        return $this->belongsTo(User::class, 'ralams_id', 'ralams_id');
    }

    /**
     * (Application relation — only if Application model exists)
     */
    // public function application() {
    //     return $this->belongsTo(Application::class, 'application_id');
    // }

    /**
     * (If MasterAttachment is created then we will active this)
     */
    // public function masterAttachment() {
    //     return $this->belongsTo(MasterAttachment::class, 'document_id', 'document_id');
    // }
}
