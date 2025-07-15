<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model {
    protected $table = 'applications';
        use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'application_number',
        'purpose_id',
        'application_rule_id',
        'office_id',
        'department_id',
        'applicant_name',
        'applicant_fname',
        'applicant_mnumber',
        'applicant_add1',
        'applicant_add2',
        'applicant_add3',
        'applicant_state',
        'applicant_district',
        'applicant_tehsil',
        'pin_code',
        'status_flag',
        'status',
        'last_forward_to_id',
        'last_forward_to_sso',
        'is_org',
    ];

    /**
     * Purpose relationship.
     */
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    /**
     * Application Rule relationship.
     */
    public function applicationRule()
    {
        return $this->belongsTo(ApplicationRule::class);
    }

    /**
     * Office relationship.
     */
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    /**
     * Department relationship.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function documents() {
        return $this->hasMany(ApplicationDocument::class);
    }

    public function transactions() {
        return $this->hasMany(ApplicationTransaction::class);
    }

}
