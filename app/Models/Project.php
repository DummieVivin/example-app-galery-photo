<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    // Membuat Registrasi Nama Kolom atau Field
    protected $guarded = ['name', 'user_id'];
}
