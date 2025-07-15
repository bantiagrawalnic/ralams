<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandOwnerDetail extends Model {
    protected $table = 'land_owner_details';

    protected $fillable = [
        'application_id',
        'owner_name',
        'owner_fname',
        'owner_add1',
        'owner_add2',
        'owner_add3',
        'pin_code',
        'khasra_number',
        'land_area',
    ];

    // Relations

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}