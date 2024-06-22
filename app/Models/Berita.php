<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function scopePencarian(Builder $query): void
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body','like','%' . request('search') . '%');
        }
    }
}
