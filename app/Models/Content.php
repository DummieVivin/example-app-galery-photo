<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    //Registrasi Nama Table Contents
    protected $table = 'contents';

    //Registrasi Nama Kolom / Field Table Contents
    protected $fillable = [
        'body',
        'post_id'
    ];

    //Membuat Relasi Table Contents ke Table Posts
    public function posts(){
        return $this->belongsTo(Post::class);
    }

}
