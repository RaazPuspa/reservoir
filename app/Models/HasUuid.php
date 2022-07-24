<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function booted(): void
    {
        static::creating(static function (self $model) {
            $model->uuid ??= Str::orderedUuid()->toString();
        });
    }
}
