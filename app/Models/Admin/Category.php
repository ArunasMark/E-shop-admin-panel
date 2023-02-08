<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;

    protected $fillable = [
        'id',
        'title',
        'alias',
        'parent_id',
        'keywords',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function children(){
        return $this->hasMany('App\Models\Admin\Category','parent_id');
    }
}
