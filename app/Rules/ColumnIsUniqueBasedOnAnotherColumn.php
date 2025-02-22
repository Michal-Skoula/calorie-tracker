<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Translation\PotentiallyTranslatedString;

class ColumnIsUniqueBasedOnAnotherColumn implements ValidationRule
{
	protected Model $model;
	protected string $unique_column;
	protected string $column_to_validate;
	protected string $column_to_validate_value;

	/**
	 * @param  Model  $model The model where to check the uniqueness
	 * @param  string  $unique_column Column which should be unique
	 * @param  string  $column_to_validate Column to check against
	 */
	public function __construct(Model $model, string $unique_column, string $column_to_validate, mixed $column_to_validate_value)
	{
		$this->model = $model;
		$this->unique_column = $unique_column;
		$this->column_to_validate = $column_to_validate;
		$this->column_to_validate_value = $column_to_validate_value;
	}


	/**
	 *
	 *
	 * @param  string  $attribute Name of the field being validated (like <input name="this_is_the_attribute">)
	 * @param  mixed  $value Value of the field
	 * @param  Closure  $fail
	 * @return void
	 */
	public function validate(string $attribute, mixed $value, Closure $fail): void
    {
		$isNotUnique = $this->model::whereExists([
			[$this->unique_column, $value],
			[$this->column_to_validate, $this->column_to_validate_value]
		])->first();

		if($isNotUnique) {
			$fail("The $this->unique_column is not unique as there is a repeating entry in $this->column_to_validate.");
		}
    }
}
