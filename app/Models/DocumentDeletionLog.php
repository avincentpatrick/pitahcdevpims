<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDeletionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'user_id',
        'reason',
    ];
}
