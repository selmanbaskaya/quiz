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

    protected $fillable = ['title', 'description', 'slug', 'status', 'finished_at'];
    protected $dates = ['finished_at'];
    protected $appends = ['details'];

    public function getFinishedAtAttributes($date) {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    public function myResult() {
        return $this->hasOne('App\Models\Result')->where('user_id', auth()->user()->id);
    }

    public function results() {
        return $this->hasMany('App\Models\Result');;
    }

    public function getDetailsAttribute() {
        if ($this->results()->count() > 0) {
            return [
                'average'=>round($this->results()->avg('point')),
                'join_count'=>$this->results()->count()
            ];
        }

        return null;
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
