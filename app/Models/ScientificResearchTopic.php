<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ScientificResearchTopic
 * 
 * @property int $id
 * @property string $employee_code
 * @property string|null $scientific_research_topic_name
 * @property string|null $year_of_begin
 * @property string|null $year_of_complete
 * @property string|null $level_topic
 * @property string|null $responsibility_in_the_topic
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class ScientificResearchTopic extends Model
{
	protected $table = 'scientific_research_topics';
	public $timestamps = false;

	protected $fillable = [
		'employee_code',
		'scientific_research_topic_name',
		'year_of_begin',
		'year_of_complete',
		'level_topic',
		'responsibility_in_the_topic'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
