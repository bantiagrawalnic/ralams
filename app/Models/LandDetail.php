<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandDetail extends Model {
    use HasFactory;

    protected $table = 'land_details';

    protected $fillable = [
        'application_id',
        'land_map_document_id',
        'village_code',
        'proposed_land_area',
        'irrigation_land',
        'irrigation_detail',
        'soil_classification',
        'dist_from_SH',
        'dist_from_NH',
        'dist_from_RL',
        'dist_from_City',
        'is_land_surrendered',
        'surrender_details',
        'land_type',
        'jamabandi_file',
        'revenue_map_file',
        'khatedari_proceeding',
        'khatedari_proceeding_file',
        'khatedari_proceeding_details',
        'under_acquisition_act_1894',
        'under_acquisition_act_1894_file',
        'is_command_area',
        'development_fees',
        'premium_rate',
        'challan_number',
        'challan_date',
        'challan_file',
        'other_details',
    ];

    // ================= Relations =================
    
    public function application() {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class,'village_code','Village_Id');
    }

    public function landMapDocument() {
        return $this->belongsTo(LandMapDocument::class, 'land_map_document_id');
    }
}

