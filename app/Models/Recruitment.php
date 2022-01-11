<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = 'recruitments';

    protected $fillable = [
        'slug', 'name', 'picture', 'quantity', 'position', 'short_description', 'content', 'end_time', 'status'
    ];

    public function withPosition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RecruitmentPosition::class, 'position');
    }
}
