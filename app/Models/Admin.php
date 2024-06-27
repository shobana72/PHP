<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $reg = 'sample';

    public function storeBlog($reg){
        $id = DB::table($this->reg)->insertGetId($reg);
        return $id;
    }

}