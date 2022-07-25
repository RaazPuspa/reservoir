<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string $uuid
 * @phpstan-ignore-next-line
 * @mixin IdeHelperSnippet
 */
class Snippet extends Model
{
    use HasUuid;
    use SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $fillable = ['title', 'description', 'code'];

    protected $visible = ['uuid', 'title', 'description', 'code', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<callable, null>
     */
    public function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string $createdAt) => Carbon::parse($createdAt)->toDayDateTimeString(),
        );
    }
}
