<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Course extends Model
{
    use HasFactory;

	protected $fillable = [
		'name',
		'available',
	];

	public function modules(): HasMany
	{
		return $this->hasMany(Module::class);
	}

	public function lesson(): BelongsTo
	{
		return $this->BelongsTo(Lesson::class);
	}

	public function image(): MorphOne
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function Comments(): MorphMany
	{
		return $this->morphMany(Comment::class, 'commentable');
	}
}
