<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Lesson extends Model
{
    use HasFactory;

	protected $fillable = [
		'name',
		'video',
	];

	public function module(): BelongsTo
	{
		return $this->BelongsTo(Module::class);
	}

	public function Comments(): MorphMany
	{
		return $this->morphMany(Comment::class, 'commentable');
	}
}
