<?php

  /**
   * Created by Reliese Model.
   */

  namespace App\Models;

  use Carbon\Carbon;
  use Illuminate\Database\Eloquent\Model;

  /**
   * Class Valmon
   *
   * @property Carbon $fecha
   * @property int $moneda
   * @property float $valor
   *
   * @package App\Models
   */
  class Valmon extends Model
  {
    protected $connection = 'on_the_fly';
    protected $table = 'valmon';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
      'moneda' => 'int',
      'valor' => 'float'
    ];

    protected $dates = [
      'fecha'
    ];

    protected $fillable = [
      'valor'
    ];
  }
