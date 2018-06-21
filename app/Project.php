<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    // Mass assigned

    protected $fillable = ['title','link','user_id','budget', 'created_by', 'modified_by','project_id'];

    // Mutators
//    public function setSlugAttribute($value) {
//        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
//    }

//    public function children() {
//        return $this->hasMany(self::class, 'parent_id');
//    }
}
