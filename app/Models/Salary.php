<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Salary
 * 
 * @property int $id
 * @property string $employee_code
 * @property float|null $minimum_salary
 * @property float|null $salary_coefficient
 * @property float|null $social_insurance
 * @property float|null $health_insurance
 * @property float|null $unemployment_insurance
 * @property float|null $allowance
 * @property float|null $income_tax
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Salary extends Model
{
	protected $table = 'salaries';
	public $timestamps = false;

	protected $casts = [
		'minimum_salary' => 'float',
		'salary_coefficient' => 'float',
		'social_insurance' => 'float',
		'health_insurance' => 'float',
		'unemployment_insurance' => 'float',
		'allowance' => 'float',
		'income_tax' => 'float'
	];

	protected $fillable = [
		'employee_code',
		'minimum_salary',
		'salary_coefficient',
		'social_insurance',
		'health_insurance',
		'unemployment_insurance',
		'allowance',
		'income_tax'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
