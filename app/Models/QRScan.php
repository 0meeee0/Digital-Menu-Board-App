<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRScan extends Model
{
    use HasFactory;
    protected $fillable = ['qr_id', 'scanned_at'];
}
