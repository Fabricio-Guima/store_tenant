<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsTenantScope;

class Store extends Model
{
    use HasFactory, BelongsTenantScope;
  
}
