<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentPosition extends Model
{
    protected $table = 'recruitment_positions';

    protected $fillable = [
        'name', 'slug', 'status'
    ];

    public function withRecruitment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Recruitment::class, 'position')->where('status', '=', 1);
    }
}
