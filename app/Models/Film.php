<?php

namespace App\Models;

use App\Enums\FilmStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Film extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'status_id',
        'subtitle_id',
        'start_date',
        'end_date',
        'national',
        'duration',
        'description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getStatusNameAttribute()
    {
        return FilmStatusEnum::getKeyByValue($this->status);
    }

}
