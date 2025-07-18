<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model {
    protected $fillable = ['name', 'email', 'metrics', 'ai_result', 'pdf_path', 'locale'];
}