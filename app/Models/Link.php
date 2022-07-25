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
 * @mixin IdeHelperLink
 */
class Link extends Model
{
    use HasUuid;
    use SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $fillable = ['title', 'url', 'in_new_tab'];

    protected $visible = ['uuid', 'title', 'url', 'in_new_tab', 'created_at'];

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
