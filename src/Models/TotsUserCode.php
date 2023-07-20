<?php

namespace Tots\AuthTfaBasic\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TotsUserCode extends Model
{
    protected $table = 'tots_user_code';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;
}