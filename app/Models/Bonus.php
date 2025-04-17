<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bonus
 * 
 * @property int $id
 * @property string $employee_code
 * @property Carbon|null $bonus_date
 * @property string|null $reason
 * @property float|null $bonus_money
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Bonus extends Model
{
	protected $table = 'bonuses';
	public $timestamps = false;

	protected $casts = [
		'bonus_date' => 'datetime',
		'bonus_money' => 'float'
	];

	protected $fillable = [
		'employee_code',
		'bonus_date',
		'reason',
		'bonus_money'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
