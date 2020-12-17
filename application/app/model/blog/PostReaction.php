<?php

namespace App\model\blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostReaction extends Model
{
    use SoftDeletes;
}
