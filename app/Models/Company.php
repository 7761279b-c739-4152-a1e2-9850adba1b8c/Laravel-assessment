<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $guarded = [];
    public function employees(): HasMany
    {
        return $this->HasMany(Employee::class);
    }
}
