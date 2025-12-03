<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'company_name',
        'owner_name',
        'locations', // JSON array
        'logo',
        'favicon',
        'contact_email',
        'contact_phone',
        'address',
        'extra', // JSON for any additional settings
    ];

    protected $casts = [
        'locations' => 'array',
        'extra' => 'array',
    ];
}
