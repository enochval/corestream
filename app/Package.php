<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [];

    const
        POPULAR = 1,
        NOT_POPULAR = 0;

    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_service', 'package_id', 'service_id');
    }

    public function updateNoOfClick($id)
    {
        $model = $this->find($id);
        $model->no_of_click = $model->no_of_click + 1;
        return $model->update();
    }
}
