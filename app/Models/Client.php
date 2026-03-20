<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'status'])]
class Client extends Model
{
    // The $fillable property is now defined using the Fillable attribute on the class.
}
