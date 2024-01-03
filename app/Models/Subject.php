<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_subject',
        'min_age',
        'max_age',
        'start_time',
        'end_time',
        'price',
        'capacity',
        'teacher_id',
        'image',
    ];

    public function teacher()
    {
      return $this->belongsTo(Teacher::class);
    }
  }