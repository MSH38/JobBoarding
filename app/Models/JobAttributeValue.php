<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAttributeValue extends Model
{
    protected $fillable = ['working_job_id', 'attribute_id', 'value'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function workingJob()
    {
        return $this->belongsTo(WorkingJob::class);
    }
}
