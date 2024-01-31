<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'content',
        'feedback_id',
        'comment_by'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'comment_by');
    }
}
