<?php

namespace App\Models;

use App\Models\Classroom\Classroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "classroom_id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}
