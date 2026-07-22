<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailList extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function subscribers(): HasMany {

        return $this->HasMany(Subscriber::class);
    }
}
