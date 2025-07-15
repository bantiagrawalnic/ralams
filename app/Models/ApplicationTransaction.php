<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationTransaction extends Model {
    use HasFactory;
    protected $table = 'application_transactions';        
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'application_id',
        'forward_from_id',
        'forward_from_sso',
        'forward_to_id',
        'forward_to_sso',
        'forward_file',
        'forward_details',
        'comment',
        'status'
    ];
    
    // Relation with Application
    public function application() {
        return $this->belongsTo(Applicant::class)->with(['landDeatil','landOwnerDetail']);
    }
}
