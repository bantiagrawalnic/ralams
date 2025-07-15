<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'division_code', 'division_name_eng', 'division_name_reg', 'is_active',
    ];

    // ================= Relations =================
    
    /**
     * Get the districts under this division.
     */
    public function districts() {
        return $this->hasMany(District::class, 'div_code', 'division_code');
    }
}
