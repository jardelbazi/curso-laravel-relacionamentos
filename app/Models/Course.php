<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
