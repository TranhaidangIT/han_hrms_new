<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UnitUsed
 * 
 * @property int $id
 * @property string|null $unit_used_name
 * @property string|null $school_name
 * @property string|null $address
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $salary_increase_period
 *
 * @package App\Models
 */
class UnitUsed extends Model
{
	protected $table = 'unit_used';
	public $timestamps = false;

	protected $fillable = [
		'unit_used_name',
		'school_name',
		'address',
		'phone_number',
		'email',
		'salary_increase_period'
	];
}
