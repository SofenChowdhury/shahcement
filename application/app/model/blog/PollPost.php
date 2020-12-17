<?php

namespace App\model\blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollPost extends Model
{
    use SoftDeletes;
}
