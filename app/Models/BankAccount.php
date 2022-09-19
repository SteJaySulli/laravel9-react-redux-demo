<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "number",
        "sort_code",
        "card_number",
        "cvv",
        "expires_at",
    ];

    protected $casts = [
        "expires_at" => "datetime",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
