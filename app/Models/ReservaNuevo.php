<?php

  /**
   * Created by Reliese Model.
   */

  namespace App\Models;

  use Carbon\Carbon;
  use Illuminate\Database\Eloquent\Model;

  /**
   * Class Reserva
   *
   * @property int $numres
   * @property string $referencia
   * @property int $tipdoc
   * @property string $cedula
   * @property string $nit
   * @property string $nitage
   * @property int $locpro
   * @property int $codpai
   * @property int $codciu
   * @property float $pordes
   * @property string $numhab
   * @property int $codtra
   * @property int $trasal
   * @property int $tipres
   * @property int $codcan
   * @property int $codusu
   * @property Carbon $fecres
   * @property Carbon $feclle
   * @property Carbon $fecsal
   * @property Carbon $feclim
   * @property string $hora
   * @property int $numadu
   * @property int $numnin
   * @property int $numinf
   * @property string $observacion
   * @property int $numgru
   * @property int $numpre
   * @property string $carta
   * @property string $habfij
   * @property string $reembl
   * @property string $solicitada
   * @property int $forpag
   * @property Carbon $fecest
   * @property string $estado
   * @property string $tippro
   * @property string $tipgar
   * @property int $codven
   * @property string $idresweb
   * @property string $idcanal
   * @property string $idclifre
   * @property string $tipseg
   * @property array $metadata
   * @property array $confirmationid
   *
   * @package App\Models
   */
  class ReservaNuevo extends Model
  {
    protected $connection = 'on_the_fly';
    protected $table = 'reserva_nuevos';
    protected $primaryKey = 'numres';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
      'numres' => 'int',
      'tipdoc' => 'int',
      'locpro' => 'int',
      'codpai' => 'int',
      'codciu' => 'int',
      'pordes' => 'float',
      'codtra' => 'int',
      'trasal' => 'int',
      'tipres' => 'int',
      'codcan' => 'int',
      'codusu' => 'int',
      'numadu' => 'int',
      'numnin' => 'int',
      'numinf' => 'int',
      'numgru' => 'int',
      'numpre' => 'int',
      'forpag' => 'int',
      'codven' => 'int',
      'metadata' => 'json'
    ];

    protected $dates = [
      'fecres',
      'feclle',
      'fecsal',
      'feclim',
      'fecest'
    ];

    protected $fillable = [
      'numres',
      'referencia',
      'tipdoc',
      'cedula',
      'nit',
      'nitage',
      'locpro',
      'codpai',
      'codciu',
      'pordes',
      'numhab',
      'codtra',
      'trasal',
      'tipres',
      'codcan',
      'codusu',
      'fecres',
      'feclle',
      'fecsal',
      'feclim',
      'hora',
      'numadu',
      'numnin',
      'numinf',
      'observacion',
      'numgru',
      'numpre',
      'carta',
      'habfij',
      'reembl',
      'solicitada',
      'forpag',
      'fecest',
      'estado',
      'tippro',
      'tipgar',
      'codven',
      'idresweb',
      'idcanal',
      'idclifre',
      'tipseg',
      'metadata',
      'confirmationid',
      'guarantee',
      'booker',
      'onlinecomment',
      'cancellationid',
      'modifyid',
      'rateplancode',
      'reteplanname',
      'ratelist',
      'desayuno',
    ];
  }
