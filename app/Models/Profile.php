<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'email',
        'telepon',
        'alamat',
        'bio',
        'hobi',
        'github_url',
        'instagram_url',
        'linkedin_url',
        'foto',
    ];
}
