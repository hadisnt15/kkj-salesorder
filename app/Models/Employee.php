<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'EmpUsrId',
        'EmpCode',
        'div'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'EmpUsrId', 'id');
    }
}
