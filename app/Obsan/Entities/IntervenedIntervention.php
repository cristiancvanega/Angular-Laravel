<?php

namespace App\Obsan\Entities;

class IntervenedIntervention extends Model
{
    protected $table = 'intervened_intervention';
    protected $fillable =[
        'interventions_id',
        'intervened_id'
    ];

    public function intervened()
    {
        return $this->hasMany(
            Intervened::getNamespace()
        );
    }

    public function interventions()
    {
        return $this->hasMany(
            Intervention::getNamespace(),
            'id',
            'interventions_id'
        );
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function create(array $attributes = [])
    {

        $model = parent::where([
            'interventions_id'  => $attributes['interventions_id'],
            'intervened_id'     => $attributes['intervened_id']
            ])->first();

        if($model != null)
            return false;

        $model = new static($attributes);

        $model->save();

        return $model;
    }
}
