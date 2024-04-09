<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelSetting extends Model
{
    use HasFactory;
    protected $table = 'excel_setting';
    protected $fillable = ['key', 'value', 'default'];
}
