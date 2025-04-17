<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalaryUpdate
 * 
 * @property int $id
 * @property string $employee_code
 * @property float|null $current_salary
 * @property float|null $salary_after_update
 * @property float|null $salary_coefficient
 * @property float|null $social_insurance
 * @property float|null $health_insurance
 * @property float|null $unemployment_insurance
 * @property float|null $allowance
 * @property float|null $income_tax
 * @property Carbon|null $update_day
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class SalaryUpdate extends Model
{
	protected $table = 'salary_updates';
	public $timestamps = false;

	protected $casts = [
		'current_salary' => 'float',
		'salary_after_update' => 'float',
		'salary_coefficient' => 'float',
		'social_insurance' => 'float',
		'health_insurance' => 'float',
		'unemployment_insurance' => 'float',
		'allowance' => 'float',
		'income_tax' => 'float',
		'update_day' => 'datetime'
	];

	protected $fillable = [
		'employee_code',
		'current_salary',
		'salary_after_update',
		'salary_coefficient',
		'social_insurance',
		'health_insurance',
		'unemployment_insurance',
		'allowance',
		'income_tax',
		'update_day'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
