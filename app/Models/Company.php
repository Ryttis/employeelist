<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory;
    use Notifiable;

    public $fillable = ['title', 'email', 'webSite', 'image'];

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
