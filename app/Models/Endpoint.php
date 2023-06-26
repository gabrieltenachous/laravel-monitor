<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Endpoint extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['endpoint','frequency','next_check'];

    public function site(): BelongsTo {
        return $this->belongsTo(Site::class);
    }
    public function checkes(): HasMany{
        return $this->hasMany(Check::class);
    }

    public function url(): string
    {
        return env('APP_URL') . $this->endpoint;
    }

}
