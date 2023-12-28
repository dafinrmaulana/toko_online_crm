<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'message',
        'from_me',
        'mark_read',
    ];

    protected $guarded = [];

    protected $casts = [
        'from_me' => 'boolean',
        'mark_read' => 'boolean'
    ];
    
    public function user() {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
    
    public function chat_replies()
    {
        return $this->hasMany(ChatReply::class);
    }
}
