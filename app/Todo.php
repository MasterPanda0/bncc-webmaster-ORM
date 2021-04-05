<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //protected $table = 'todos';
    //protected $primaryKey='nomor';
    //protected $keyType ='string';

    protected $fillable=[
        'id','task'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];
}
