<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    protected $table='message';
    public $timestamps=false;
    protected $fillable = ['id','name','email','message','datetime','reply','reply_user','state'];
}