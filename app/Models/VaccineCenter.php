<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccineCenter extends Model
{
// In VaccineCenter.php
public function bookedSlots()
{
    return $this->hasMany(Registration::class, 'vaccine_center_id');
}


}
