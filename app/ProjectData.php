<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectData extends Model
{
    protected $table = 'project_data';
    protected $fillable = ['keyword','click_price','click_date','project_id','site_price','profit','roi'];
}
