<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $dates = [
        'birth_at'    
    ];

    protected $appends = [
        'class_name'    
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function getClassNameAttribute(){
        if($this->classroom){
            return $this->classroom->name;
        }
        return null;
    }

    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', '%' . $search . '%');
    }
}
