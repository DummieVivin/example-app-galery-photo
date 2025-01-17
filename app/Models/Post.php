<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //Registrasi field table posts
    protected $fillable = [
        'id',
        'title',
        'description',
        'category',
        'user_id',
        'slug'
    ];

    //Membuat function untuk relasi antara post dengan contents
    public function contents(){
        return $this->hasMany(Content::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title']= $value;

        if(!isset($this->attributes['slug']) || $this->attributes['title'] !== $value){
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
