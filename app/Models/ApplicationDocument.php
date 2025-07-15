<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model {
    use HasFactory;

    protected $table = 'application_documents';

    protected $fillable = [
        'application_id',
        'application_document_type',
        'application_file_path',
    ];

    // Relationships
    public function application() {
        return $this->belongsTo(Application::class);
    }
}
