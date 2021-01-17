<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'slug', 'finished_at'];
    protected $dates = ['finished_at'];

    public function getFinishedAtAttributes($date) {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable(): array
    {
        return [
            'slug' => [ //slug => databse table - column name
                'source' => 'title' //title => column that will slug
            ]
        ];
    }
}
