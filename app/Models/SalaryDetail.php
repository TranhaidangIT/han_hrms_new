<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalaryDetail
 * 
 * @property int $id
 * @property string $employee_code
 * @property float|null $basic_salary
 * @property float|null $social_insurance
 * @property float|null $health_insurance
 * @property float|null $unemployment_insurance
 * @property float|null $allowance
 * @property float|null $income_tax
 * @property float|null $bonus_money
 * @property float|null $discipline_money
 * @property Carbon|null $pay_day
 * @property float|null $total_salary
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class SalaryDetail extends Model
{
	protected $table = 'salary_details';
	public $timestamps = false;

	protected $casts = [
		'basic_salary' => 'float',
		'social_insurance' => 'float',
		'health_insurance' => 'float',
		'unemployment_insurance' => 'float',
		'allowance' => 'float',
		'income_tax' => 'float',
		'bonus_money' => 'float',
		'discipline_money' => 'float',
		'pay_day' => 'datetime',
		'total_salary' => 'float'
	];

	protected $fillable = [
		'employee_code',
		'basic_salary',
		'social_insurance',
		'health_insurance',
		'unemployment_insurance',
		'allowance',
		'income_tax',
		'bonus_money',
		'discipline_money',
		'pay_day',
		'total_salary'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
