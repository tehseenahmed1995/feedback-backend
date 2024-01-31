<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentTaggedUser extends Model
{
    use HasFactory;

    protected $table = 'comment_tagged_users';

    /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'user_id',
         'comment_id',
     ]; 
}
