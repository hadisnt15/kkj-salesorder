<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['CstCode','CstName','CstAddress','CstState','CstCity','CstPerson','CstPhoneNum'];

    public function scopeFilter(Builder $query, array $filters)   
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('CstName', 'like', '%' . $search . '%')
                ->orWhere('CstCode', 'like', '%' . $search . '%')
        );
    }
}

// $query->when(
//             $filters['search'] ?? false, 
//             fn ($query, $search) =>
//             $query->where('news_title', 'like', '%' . $search . '%')
//         ); 