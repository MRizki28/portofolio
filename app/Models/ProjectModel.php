<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;


    protected $table = 'tb_project';
    protected $fillable = [
        'id' , 'uuid' , 'title' , 'link' , 'image' , 'date' , 'tecnologi1' , 'tecnologi2' , 'tecnologi3' , 'created_at' , 'updated_at'
    ];
}
