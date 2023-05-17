<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateModel extends Model
{
    use HasFactory;
    protected $table = 'tb_certificate';
    protected $fillable = [
        'id' , 'uuid' ,'title' , 'image' , 'date_publish' ,'date_expaire', 'learn1' , 'learn2' , 'learn3' , 'created_at' , 'updated_at'
    ];
}
