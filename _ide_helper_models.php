<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\InventoryUpdate
 *
 * @property int $id
 * @property string|null $booking_engine
 * @property string|null $room_class_cloud
 * @property string|null $room_class_local
 * @property string|null $date_updated
 * @property string|null $quantity
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $xml
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereBookingEngine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereDateUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereRoomClassCloud($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereRoomClassLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InventoryUpdate whereXml($value)
 */
	class InventoryUpdate extends \Eloquent {}
}

namespace App{
/**
 * App\Database
 *
 * @property int $id
 * @property string $driver Database driver
 * @property string $host Database host
 * @property string $port Database port
 * @property string $database Database name
 * @property string $username Database username
 * @property string $password Database password
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $code Código único para la conexión
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereDatabase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Database whereUsername($value)
 */
	class Database extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Conrel
 *
 * @property int $codrel
 * @property int $codcar
 * @property int $condes
 * @property int $conexe
 * @package App\Models
 */
	class Conrel extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ClientesHotel
 *
 * @property int $cons
 * @property string $cedula
 * @property Carbon $fecha_graba
 * @property string $usuario_ip
 * @property int $numfol
 * @package App\Models
 */
	class ClientesHotel extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estcam
 *
 * @property int $numero
 * @property int $estado
 * @property int $prioridad
 * @package App\Models
 */
	class Estcam extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Eventsu
 *
 * @property int $id
 * @property int $codusu
 * @property int $events_id
 * @package App\Models
 */
	class Eventsu extends \Eloquent {}
}

namespace App\Models{
/**
 * Class FilesPerm
 *
 * @property int $id
 * @property int $codusu
 * @property int $files_id
 * @property string $pread
 * @property string $pwrite
 * @package App\Models
 */
	class FilesPerm extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Encgru
 *
 * @property int $encgru
 * @property string $detalle
 * @package App\Models
 */
	class Encgru extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipeve
 *
 * @property int $tipeve
 * @property string $detalle
 * @package App\Models
 */
	class Tipeve extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmcamenv
 *
 * @property int $id
 * @property int $codcam
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $campaign_key
 * @property string $email
 * @property string $mailuid
 * @property string $diainf
 * @property Carbon $fecent
 * @property string $estado
 * @package App\Models
 */
	class Crmcamenv extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estacon
 *
 * @property string $front
 * @property int $codcar
 * @property Carbon $fecha
 * @property int $codsal
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $servicio
 * @property string $aloja
 * @package App\Models
 */
	class Estacon extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Survey
 *
 * @property int $id
 * @property string $nombre
 * @property int $position
 * @package App\Models
 */
	class Survey extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Regcam
 *
 * @property int $codreg
 * @property Carbon $fecha
 * @property int $codusu
 * @property int $numfol
 * @property string $habini
 * @property string $habfin
 * @property string $mothab
 * @property string $nota
 * @package App\Models
 */
	class Regcam extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Traslado
 *
 * @property int $id
 * @property Carbon $fecha
 * @property int $codusu
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $newfol
 * @property int $newcue
 * @property int $newitem
 * @package App\Models
 */
	class Traslado extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perusu
 *
 * @property int $codusu
 * @property string $codper
 * @package App\Models
 */
	class Perusu extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Canre
 *
 * @property int $codcan
 * @property int $numres
 * @property Carbon $feccan
 * @property string $hora
 * @property int $motcan
 * @property string $descripcion
 * @property string $solicitada
 * @property int $codusu
 * @package App\Models
 */
	class Canre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plane
 *
 * @property int $codpla
 * @property string $descripcion
 * @property string $tipper
 * @property int $numper
 * @property string $adicional
 * @property string $tipo
 * @property int $codcla
 * @property int $tippla
 * @property int $tippro
 * @property string $muepre
 * @property string $muefac
 * @property string $observacion
 * @property string $estado
 * @property string $servicios
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereAdicional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereCodcla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereCodpla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereMuefac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereMuepre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereNumper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereServicios($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereTipper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereTippla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planes whereTippro($value)
 */
	class Planes extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipobj
 *
 * @property int $codigo
 * @property string $detalle
 * @package App\Models
 */
	class Tipobj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MedPagb
 *
 * @property int $fop_codi
 * @property string $fop_nomb
 * @package App\Models
 */
	class MedPagb extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaAccess
 *
 * @property int $id
 * @property string $canal
 * @property string $origen
 * @property string $usuario
 * @property string $token
 * @property string $claveTecnica
 * @property string $extensionArchivo
 * @property string $formatoArchivo
 * @property string $idDistribuidor
 * @property string $idSoftwareFacturacion
 * @property string $codigoSucursal
 * @property Carbon $feFechaIni
 * @package App\Models
 */
	class PtesaAccess extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Grupo
 *
 * @property int $codgru
 * @property string $detalle
 * @property string $tipo
 * @property string $genest
 * @package App\Models
 */
	class Grupo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @property string $RELACION
 * @property int $CODPAI
 * @package App\Models
 */
	class Cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SecUsersGroup
 *
 * @property string $login
 * @property int $group_id
 * @property SecUser $sec_user
 * @property SecGroup $sec_group
 * @package App\Models
 */
	class SecUsersGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Caja
 *
 * @property int $codcaj
 * @property string $nombre
 * @property int $codusu
 * @property string $estado
 * @package App\Models
 */
	class Caja extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estcan
 *
 * @property Carbon $fecha
 * @property int $codsuc
 * @property int $unidad
 * @package App\Models
 */
	class Estcan extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Preman
 *
 * @property string $ano
 * @property string $mes
 * @property int $codgru
 * @property float $valor
 * @package App\Models
 */
	class Preman extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ReccSeven
 *
 * @property int $cons
 * @property string $brec
 * @property string $rec_seven
 * @property string $nemero_seven
 * @property Carbon $fechac
 * @package App\Models
 */
	class ReccSeven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SmtpPlantilla
 *
 * @property int $id_plantilla
 * @property string $estado_plantilla
 * @property string $codigo_proceso
 * @property string $descripcion_proceso
 * @property string $plantilla_mail
 * @property int $id_smtp_cuenta
 * @property string $asunto
 * @property string $cuerpo
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @property string $anulada
 * @package App\Models
 */
	class SmtpPlantilla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ClientesAfiliado
 *
 * @property int $cons
 * @property string $cod_infra
 * @property string $servicio
 * @property string $categoria
 * @property string $ran_edad
 * @property string $genero
 * @property int $num_pers
 * @property int $participantes
 * @property int $num_usos
 * @property Carbon $fechatramite
 * @property string $iptramite
 * @package App\Models
 */
	class ClientesAfiliado extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Esteti
 *
 * @property int $codest
 * @property string $nombre
 * @property string $estado
 * @package App\Models
 */
	class Esteti extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detpla21122013
 *
 * @property int $codpla
 * @property int $codcar
 * @property float $valor
 * @property int $moneda
 * @package App\Models
 */
	class Detpla21122013 extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estacla
 *
 * @property Carbon $fecha
 * @property int $codcla
 * @property int $unidad
 * @property float $valor
 * @property float $aloja
 * @property int $numadu
 * @property int $numnin
 * @package App\Models
 */
	class Estacla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Event
 *
 * @property int $id
 * @property int $codusu
 * @property string $titulo
 * @property string $nota
 * @property Carbon $fecha
 * @property string $hora
 * @property string $repetir
 * @property string $terminar
 * @property Carbon $fecha_final
 * @property int $frecuencia
 * @property int $dia
 * @property string $alarma
 * @property string $estado
 * @package App\Models
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsReccadVenta
 *
 * @property int $cons
 * @property int $emp_codi
 * @property int $top_codi
 * @property string $mte_desc
 * @property string $mte_esta
 * @property string $ter_coda
 * @property string $cfl_codi
 * @property string $caj_codi
 * @property string $arb_cods
 * @property string $dst_codi
 * @property string $metodo
 * @package App\Models
 */
	class ParamWsReccadVenta extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Valcar
 *
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $codusu
 * @property int $codcaj
 * @property Carbon $fecha
 * @property int $cantidad
 * @property int $codcar
 * @property string $cladoc
 * @property string $numdoc
 * @property int $codpla
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $valter
 * @property float $total
 * @property string $estado
 * @property int $oldfol
 * @property string $movcor
 * @property float $subsidio
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereCladoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereCodcaj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereCodcar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereCodpla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereCodusu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereImpo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereMovcor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereNumcue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereNumdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereNumfol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereOldfol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereValor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereValser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Valcar whereValter($value)
 */
	class Valcar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RemoteAccess
 *
 * @property int $port
 * @property string $ip_address
 * @property int $started_at
 * @property string $status
 * @package App\Models
 */
	class RemoteAccess extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Facseven
 *
 * @property int $consc
 * @property string $bfac
 * @property string $fac_seven
 * @property Carbon $fechac
 * @property string $fac_cont
 * @package App\Models
 */
	class Facseven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SecCoberturaUser
 *
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 * @package App\Models
 */
	class SecCoberturaUser extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Parsi
 *
 * @property string $numero
 * @property string $usecen
 * @property string $red
 * @property int $timina
 * @property int $buztam
 * @property string $comven
 * @property string $coming
 * @property string $cueven
 * @property string $cenven
 * @property string $cuecaj
 * @property string $cencaj
 * @property string $cuecre
 * @property string $cencre
 * @property string $tipint
 * @property string $doccue
 * @property string $doccon
 * @property int $numcar
 * @property string $creedeb
 * @property string $creecre
 * @property float $porcree
 * @property string $docdep
 * @property string $docfac
 * @property string $docrec
 * @property string $docegr
 * @property string $doctel
 * @property string $facing
 * @property int $depsin
 * @property int $depapl
 * @property int $depdev
 * @property int $evesin
 * @property int $eveapl
 * @property int $concar
 * @property int $conaju
 * @property int $pagcon
 * @property int $abopre
 * @property int $motcan
 * @property int $motdes
 * @property string $cliext
 * @property string $empext
 * @property string $habres
 * @property string $preres
 * @property string $notcre
 * @property string $ivatar
 * @property string $cardes
 * @property int $usurep
 * @property string $linenc
 * @property string $conreghot
 * @package App\Models
 */
	class Parsi extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Motde
 *
 * @property int $motdes
 * @property string $detalle
 * @package App\Models
 */
	class Motde extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Wallet
 *
 * @property int $id
 * @property int $numres
 * @property string $token
 * @property string $url
 * @property Carbon $fecha
 * @property Carbon $lasmod
 * @property int $codusu
 * @property string $estado
 * @package App\Models
 */
	class Wallet extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Asteriskcdr
 *
 * @property Carbon $calldate
 * @property string $uniqueid
 * @property string $trace
 * @property string $hora
 * @package App\Models
 */
	class Asteriskcdr extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Hisusu
 *
 * @property int $id
 * @property int $codusu
 * @property int $noption
 * @property string $naction
 * @property int $number
 * @property int $lasttime
 * @package App\Models
 */
	class Hisusu extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Note
 *
 * @property int $id
 * @property int $codusu
 * @property string $note
 * @package App\Models
 */
	class Note extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cenco
 *
 * @property string $codcen
 * @property string $detalle
 * @package App\Models
 */
	class Cenco extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Camestahab
 *
 * @property int $id
 * @property int $time
 * @property int $numhab
 * @property int $codestant
 * @property int $codestdes
 * @package App\Models
 */
	class Camestahab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Hiscaj
 *
 * @property int $numero
 * @property int $codcaj
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $hora
 * @property string $estado
 * @package App\Models
 */
	class Hiscaj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Dathot
 *
 * @property string $nit
 * @property string $tipest
 * @property string $nombre
 * @property string $nomcad
 * @property string $nomger
 * @property int $codpai
 * @property string $nomdep
 * @property string $nomciu
 * @property string $direccion
 * @property string $telefono
 * @property string $telefono2
 * @property string $fax
 * @property string $apapos
 * @property string $sitweb
 * @property string $email
 * @property string $resfac
 * @property Carbon $fecfac
 * @property string $prefac
 * @property int $numfac
 * @property int $numfai
 * @property int $numfaf
 * @property string $notfac
 * @property string $notrec
 * @property string $notreg
 * @property string $notica
 * @property string $notsoft
 * @property int $numpre
 * @property int $numrec
 * @property int $numegr
 * @property int $numcam
 * @property int $condas
 * @property string $coddas
 * @property int $ciudas
 * @property Carbon $fecha
 * @property string $location
 * @property float $longitude
 * @property float $latitude
 * @property string $apikey
 * @property string $whemet
 * @property string $wheater
 * @property string $serial
 * @property string $version
 * @property string $webservice_seven
 * @property string $seven_sucursal
 * @package App\Models
 * @property string|null $guarantee_password Password para la ver la garantia de la reserva en linea
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereApapos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereApikey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereCiudas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereCoddas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereCodpai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereCondas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereFecfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereGuaranteePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNomcad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNomciu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNomdep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNomger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNotfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNotica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNotrec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNotreg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNotsoft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumcam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumegr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumfaf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumfai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumpre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereNumrec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot wherePrefac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereResfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereSitweb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereTelefono2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereTipest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereWheater($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dathot whereWhemet($value)
 */
	class Dathot extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perdet
 *
 * @property int $id
 * @property int $perabo_id
 * @property int $numcue
 * @property int $numrec
 * @property float $valor
 * @package App\Models
 */
	class Perdet extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Contel
 *
 * @property int $codigo
 * @property string $pricam
 * @property string $segcam
 * @property string $tercam
 * @property string $cuacam
 * @property string $quicam
 * @property string $sexcam
 * @property string $sepcam
 * @property string $octcam
 * @property int $cobapa
 * @property string $nit
 * @property string $extadm
 * @property string $regnoc
 * @package App\Models
 */
	class Contel extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SecUser
 *
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 * @property Collection|SecUsersGroup[] $sec_users_groups
 * @package App\Models
 */
	class SecUser extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Pwscliente
 *
 * @property int $cons
 * @property string $emp_codi
 * @property string $mod_codi
 * @property string $lis_codi
 * @package App\Models
 */
	class Pwscliente extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Asicam
 *
 * @property int $codcam
 * @property string $numhab
 * @property Carbon $fecha
 * @property string $horini
 * @property string $horfin
 * @property string $observacion
 * @property string $estado
 * @package App\Models
 */
	class Asicam extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ene31cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Ene31cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Logintneg
 *
 * @property int $idintneg
 * @property string $nombre_archivo
 * @property string $ubicacion_archivo
 * @property string $fecha_cierre
 * @property string $sistema
 * @property string $medio_envio
 * @property string $enviado
 * @property string $error_envio
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @package App\Models
 */
	class Logintneg extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cocoa
 *
 * @property int $numruc
 * @property string $razsoc
 * @property string $dirmat
 * @property int $telefono
 * @property int $fax
 * @property string $email
 * @property string $tiprep
 * @property int $numrep
 * @property int $ruccon
 * @package App\Models
 */
	class Cocoa extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cliseven
 *
 * @property int $consc
 * @property string $bcliente
 * @property string $cli_seven
 * @property Carbon $fechac
 * @package App\Models
 */
	class Cliseven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ingreso
 *
 * @property int $id
 * @property int $codusu
 * @property int $hora
 * @property string $ipaddress
 * @property string $remote_host
 * @package App\Models
 */
	class Ingreso extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plaint
 *
 * @property int $codigo
 * @property int $gruint
 * @property string $nombre
 * @property string $descripcion
 * @property string $garantia
 * @property string $cancelacion
 * @property int $codcla
 * @property int $numini
 * @property int $numfin
 * @property int $minnoc
 * @property float $valor
 * @property float $iva
 * @property float $total
 * @property float $valorn
 * @property string $promocion
 * @property string $codpro
 * @property string $restringido
 * @property string $estado
 * @package App\Models
 */
	class Plaint extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaEstadosFactura
 *
 * @property int $id
 * @property string $nombre
 * @property bool $permiteCambio
 * @package App\Models
 */
	class PtesaEstadosFactura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Segeve
 *
 * @property int $codseg
 * @property string $detalle
 * @package App\Models
 */
	class Segeve extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estcaj
 *
 * @property string $estado
 * @property string $detalle
 * @package App\Models
 */
	class Estcaj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Bloest
 *
 * @property int $codest
 * @property int $numero
 * @package App\Models
 */
	class Bloest extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Camarera
 *
 * @property int $codcam
 * @property string $nombre
 * @property int $cantidad
 * @property int $numhab
 * @property int $codusu
 * @property string $estado
 * @package App\Models
 */
	class Camarera extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Magentum
 *
 * @property int $id
 * @property int $codusu
 * @property string $token
 * @package App\Models
 */
	class Magentum extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Pwsreccaj
 *
 * @property int $cons
 * @property string $fop_codi
 * @property string $ban_codi
 * @property string $tac_codi
 * @property string $arb_csuc
 * @property string $top_codi
 * @property string $cl_codi
 * @property string $cja_codi
 * @package App\Models
 */
	class Pwsreccaj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamProduc
 *
 * @property int $cons
 * @property string $cod_cargo
 * @property string $pro_codi
 * @property string $abr_codc
 * @package App\Models
 */
	class ParamProduc extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Carghab
 *
 * @property int $numfol
 * @property int $numcue
 * @property string $prefac
 * @property int $numfac
 * @property string $tipfac
 * @property string $numdoc
 * @property string $exento
 * @property string $estado
 * @package App\Models
 */
	class Carghab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SecApp
 *
 * @property string $app_name
 * @property string $app_type
 * @property string $description
 * @property Collection|SecGroupsApp[] $sec_groups_apps
 * @package App\Models
 */
	class SecApp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tippla
 *
 * @property int $tippla
 * @property string $detalle
 * @property string $genest
 * @package App\Models
 */
	class Tippla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Parint
 *
 * @property int $id
 * @property string $pagint
 * @property string $paspag
 * @property int $usuint
 * @property int $forint
 * @property int $conint
 * @property int $resint
 * @property int $venint
 * @property int $grucor
 * @property string $email1
 * @property string $email2
 * @property string $cobseg
 * @property int $usupag
 * @property string $llaenc
 * @property string $enviro
 * @property string $descripcion
 * @property string $nitint
 * @package App\Models
 */
	class Parint extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ene15cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Ene15cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaTiposRegiman
 *
 * @property int $id
 * @property string $nombre
 * @property string $codigo
 * @package App\Models
 */
	class PtesaTiposRegiman extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Valcarh
 *
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $codusu
 * @property int $codcaj
 * @property Carbon $fecaud
 * @property Carbon $fecha
 * @property int $cantidad
 * @property int $codcar
 * @property string $cladoc
 * @property string $numdoc
 * @property int $codpla
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $valter
 * @property float $total
 * @property string $estado
 * @property int $oldfol
 * @property string $movcor
 * @property float $subsidio
 * @package App\Models
 */
	class Valcarh extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmacti
 *
 * @property int $id
 * @property int $codusu
 * @property string $tipo
 * @property string $asunto
 * @property string $descripcion
 * @property Carbon $fecha
 * @property string $hora
 * @property string $tiplla
 * @property string $contes
 * @property string $duracion
 * @property string $recordar
 * @property int $cuando
 * @property int $events_id
 * @property string $ubicacion
 * @property string $tiprel
 * @property int $codopo
 * @property int $codcam
 * @property string $nit
 * @package App\Models
 */
	class Crmacti extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SegWsGroup
 *
 * @property int $group_id
 * @property string $description
 * @property Collection|SegWsGroupsApp[] $seg_ws_groups_apps
 * @property Collection|SegWsUsersGroup[] $seg_ws_users_groups
 * @package App\Models
 */
	class SegWsGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Sec1User
 *
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 * @package App\Models
 */
	class Sec1User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Conre
 *
 * @property int $numres
 * @property int $codcla
 * @property int $cantidad
 * @property int $codpla
 * @package App\Models
 */
	class Conre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipcli
 *
 * @property int $tipcli
 * @property string $detalle
 * @property string $predeterminado
 * @package App\Models
 */
	class Tipcli extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsCreaCartera
 *
 * @property int $cons
 * @property int $empresa
 * @property int $tipo_operacion
 * @property string $descripcion
 * @property int $dcl_codd
 * @property int $abr_cods
 * @property int $abr_coda
 * @property int $abr_codc
 * @property int $abr_codp
 * @property string $cxc_tipo
 * @property int $cxc_cond
 * @package App\Models
 */
	class ParamWsCreaCartera extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Firewall
 *
 * @property int $id
 * @property int $codusu
 * @property string $ipaddress
 * @package App\Models
 */
	class Firewall extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Preope
 *
 * @property string $codigo
 * @property string $nombre
 * @package App\Models
 */
	class Preope extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Confpre
 *
 * @property int $id
 * @property string $polcan
 * @property string $polnoshow
 * @property string $costos
 * @property string $horas
 * @property string $notas
 * @package App\Models
 */
	class Confpre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class AmcCliente
 *
 * @property string $cedula
 * @property int $tipdoc
 * @property string $lugexp
 * @property string $categoria
 * @property string $accion
 * @property string $nombre
 * @property string $sexo
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 * @property string $direccion
 * @property int $locdir
 * @property int $codpai
 * @property int $codciu
 * @property Carbon $fecnac
 * @property int $locnac
 * @property int $codnac
 * @property int $codpro
 * @property Carbon $ultest
 * @property int $numest
 * @property Carbon $feccre
 * @property int $tipcli
 * @property string $credito
 * @property string $tipcre
 * @property float $cupo
 * @property int $diaven
 * @property string $exento
 * @property string $cuepla
 * @property string $clides
 * @property string $actint
 * @property string $tipinf
 * @property string $observacion
 * @property string $soundphone
 * @property string $estado
 * @property string $estsis
 * @package App\Models
 */
	class AmcCliente extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tiphab
 *
 * @property int $tiphab
 * @property string $detalle
 * @package App\Models
 */
	class Tiphab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Valnot
 *
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property string $nota
 * @package App\Models
 */
	class Valnot extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cammon
 *
 * @property int $numcam
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $moneda
 * @property float $valorm
 * @property float $valorc
 * @property string $estado
 * @package App\Models
 */
	class Cammon extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Canfac
 *
 * @property int $canfac
 * @property string $detalle
 * @package App\Models
 */
	class Canfac extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Delivery
 *
 * @property int $id
 * @property string $relay_key
 * @property Carbon $created_at
 * @package App\Models
 */
	class Delivery extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsVenta
 *
 * @property int $cons
 * @property int $emp_codi
 * @property int $top_codi
 * @property string $mte_desc
 * @property string $mte_esta
 * @property string $ter_coda
 * @property string $cfl_codi
 * @property string $caj_codi
 * @property string $arb_cods
 * @property string $dst_codi
 * @property string $arb_coda
 * @package App\Models
 */
	class ParamWsVenta extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Fecdec
 *
 * @property int $id
 * @property string $digito
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property Carbon $fecha
 * @package App\Models
 */
	class Fecdec extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Reccaj
 *
 * @property int $numrec
 * @property string $cedula
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $telefono
 * @property Carbon $fecha
 * @property int $codcaj
 * @property int $codusu
 * @property int $codcar
 * @property int $codven
 * @property string $nota
 * @property string $estado
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereCedula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereCodcaj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereCodcar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereCodusu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereCodven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereNota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereNumrec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reccaj whereTelefono($value)
 */
	class Reccaj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plafol
 *
 * @property int $numfol
 * @property int $numpla
 * @property int $codpla
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property float $subsidio
 * @package App\Models
 */
	class Plafol extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaMotivosRechazo
 *
 * @property int $id
 * @property string $nombre
 * @package App\Models
 */
	class PtesaMotivosRechazo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Empresa
 *
 * @property string $nit
 * @property string $nombre
 * @property string $razsoc
 * @property int $locfac
 * @property string $dirfac
 * @property string $telfac
 * @property int $locdir
 * @property int $codpai
 * @property int $codciu
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property string $sitweb
 * @property string $encargado
 * @property int $codact
 * @property string $autoretenedor
 * @property string $tipreg
 * @property string $credito
 * @property string $tipcre
 * @property int $diaven
 * @property float $cupo
 * @property int $diacor
 * @property string $exento
 * @property string $cuepla
 * @property string $actint
 * @property string $observacion
 * @property int $codven
 * @property int $forpag
 * @property Carbon $feccre
 * @property string $soundphone
 * @property string $estsis
 * @property int $ciudades_dian
 * @package App\Models
 */
	class Empresa extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Divcar
 *
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $cuetra
 * @property int $itetra
 * @property float $valdiv
 * @property int $codusu
 * @property Carbon $fecha
 * @package App\Models
 */
	class Divcar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Modulo
 *
 * @property string $codmod
 * @property string $nombre
 * @property int $codper
 * @package App\Models
 */
	class Modulo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detpla
 *
 * @property int $codpla
 * @property int $codcar
 * @property float $valor
 * @property int $moneda
 * @property float $subsidio
 * @package App\Models
 */
	class Detpla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamTipdoc
 *
 * @property int $tipdoc
 * @property int $tipcodi
 * @package App\Models
 */
	class ParamTipdoc extends \Eloquent {}
}

namespace App\Models{
/**
 * Class LogPlanillaReccad
 *
 * @property int $cons
 * @property string $bfac
 * @property string $fac_seven
 * @property string $fac_cont
 * @property Carbon $fecha_procesa
 * @property string $proceso
 * @package App\Models
 */
	class LogPlanillaReccad extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estapro
 *
 * @property Carbon $fecha
 * @property int $tippro
 * @property int $unidad
 * @property float $venta
 * @package App\Models
 */
	class Estapro extends \Eloquent {}
}

namespace App\Models{
/**
 * Class File
 *
 * @property int $id
 * @property string $titulo
 * @property string $rname
 * @property string $path
 * @property string $mime
 * @property int $fsize
 * @property Carbon $fcreated
 * @property string $ubica
 * @property int $codusu
 * @property string $fpassword
 * @property string $encrypt
 * @property string $status
 * @package App\Models
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Permiso
 *
 * @property string $codper
 * @property string $nombre
 * @property string $tipo
 * @property int $codgru
 * @property int $menu
 * @property int $opcion
 * @package App\Models
 */
	class Permiso extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Feb01cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Feb01cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaInfocamara
 *
 * @property int $id
 * @property string $barrio
 * @property string $ciudad
 * @property string $codigoPais
 * @property string $codigoSucursal
 * @property string $departamento
 * @property string $direccion
 * @property bool $esEstablecimiento
 * @property string $nombreEstalecimiento
 * @property string $nombreSucursal
 * @property string $numeroMatriculaMercantil
 * @property string $pais
 * @property string $tipoEstablecimiento
 * @property int $zonaPostal
 * @package App\Models
 */
	class PtesaInfocamara extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Acuinf
 *
 * @property int $gruest
 * @property float $mes
 * @property float $ano
 * @package App\Models
 */
	class Acuinf extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Habitacion
 *
 * @property string $numhab
 * @property int $codcla
 * @property string $area
 * @property int $piso
 * @property int $numcam
 * @property string $fumador
 * @property string $observacion
 * @property string $tipo
 * @property string $extension
 * @property string $signature
 * @property int $codest
 * @property string $estado
 * @package App\Models
 */
	class Habitacion extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Telefono
 *
 * @property int $id
 * @property string $linea
 * @property string $estado
 * @package App\Models
 */
	class Telefono extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmsmalist
 *
 * @property int $id
 * @property int $crmlists_id
 * @property string $tipo
 * @property string $value
 * @package App\Models
 */
	class Crmsmalist extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estacont
 *
 * @property int $codcar
 * @property Carbon $fecha
 * @property float $valor
 * @property float $iva
 * @property float $servicio
 * @property string $aloja
 * @package App\Models
 */
	class Estacont extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Vendedor
 *
 * @property int $codven
 * @property string $cedula
 * @property string $nombre
 * @property string $estado
 * @package App\Models
 */
	class Vendedor extends \Eloquent {}
}

namespace App\Models{
/**
 * Class FechasReporte
 *
 * @property int $cons
 * @property Carbon $fecha_inicial
 * @property Carbon $fecha_final
 * @package App\Models
 */
	class FechasReporte extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Confcir
 *
 * @property int $id
 * @property string $notext
 * @package App\Models
 */
	class Confcir extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Gareve
 *
 * @property int $codeve
 * @property int $item
 * @property int $codusu
 * @property int $codcaj
 * @property Carbon $fecha
 * @property int $codcar
 * @property float $total
 * @property int $numrec
 * @property int $numegr
 * @property string $estado
 * @package App\Models
 */
	class Gareve extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Dirhot
 *
 * @property int $id
 * @property string $tipo
 * @property string $nombre
 * @property string $cargo
 * @property string $ciudad
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 * @package App\Models
 */
	class Dirhot extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Preopei
 *
 * @property string $codigo
 * @property string $nombre
 * @package App\Models
 */
	class Preopei extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaObligado
 *
 * @property int $id
 * @property bool $adjuntarPDF
 * @property string $correoDistribucion
 * @property string $telefonoCelular
 * @property bool $usaSucursales
 * @property int $tipoIdentificacion
 * @property string $numeroIdentificacion
 * @property string $codigoVerificacion
 * @property string $usuarioFE
 * @property int $codigoCiudad
 * @property int $codigoPais
 * @property int $codigoDept
 * @property int $tipoContribuyente
 * @property int $tipoRegimen
 * @property string $NCPrefijo
 * @property int $NCIni
 * @property int $NCFin
 * @property string $NDPrefijo
 * @property int $NDIni
 * @property int $NDFin
 * @package App\Models
 */
	class PtesaObligado extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Aplint
 *
 * @property int $codigo
 * @property int $codint
 * @property string $tipo
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @package App\Models
 */
	class Aplint extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Temporada
 *
 * @property int $codigo
 * @property string $tipo
 * @property string $mesini
 * @property string $mesfin
 * @package App\Models
 */
	class Temporada extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Usuario
 *
 * @property int $codusu
 * @property int $codsuc
 * @property string $nombre
 * @property string $login
 * @property string $pass
 * @property string $password
 * @property string $foto
 * @property string $email
 * @property string $telefono
 * @property string $genero
 * @property int $codprf
 * @property int $ultlog
 * @property string $ipaddress
 * @property string $status
 * @property int $writing
 * @property Carbon $camcla
 * @property string $estado
 * @package App\Models
 */
	class Usuario extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SevenOperacione
 *
 * @property int $id
 * @property string $codigo_operacion
 * @property string $operacion
 * @property string $descripcion_operacion
 * @property string $codigo_opera_seven
 * @package App\Models
 */
	class SevenOperacione extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsReccajImpuesto
 *
 * @property int $cons
 * @property int $codcar
 * @property string $descripcion
 * @property string $concepto
 * @property float $porc_iva
 * @property float $porc_impo
 * @property int $control
 * @package App\Models
 */
	class ParamWsReccajImpuesto extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plalan
 *
 * @property int $codigo
 * @property int $codint
 * @property string $lang
 * @property string $nombre
 * @property string $descripcion
 * @property string $garantia
 * @property string $cancelacion
 * @package App\Models
 */
	class Plalan extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plasabo
 *
 * @property int $id
 * @property int $numres
 * @property int $plasticine_id
 * @property string $token
 * @property float $valor
 * @property Carbon $created_at
 * @property Carbon $modified_in
 * @property string $estado
 * @package App\Models
 */
	class Plasabo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsPlanillaCabe
 *
 * @property int $cons
 * @property int $emp_codi
 * @property int $top_codi
 * @property string $mte_desc
 * @property string $mte_esta
 * @property string $ter_coda
 * @property string $cfl_codi
 * @property string $caj_codi
 * @property string $arb_cods
 * @property string $dst_codi
 * @property string $metodo
 * @package App\Models
 */
	class ParamWsPlanillaCabe extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Documento
 *
 * @property string $cladoc
 * @property string $nombre
 * @property string $tipo
 * @package App\Models
 */
	class Documento extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perprf
 *
 * @property string $codper
 * @property int $codprf
 * @package App\Models
 */
	class Perprf extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plasticine
 *
 * @property int $id
 * @property int $numres
 * @property string $clave
 * @property int $codusu
 * @property Carbon $fecha
 * @property Carbon $modified_in
 * @property string $tipdoc
 * @property string $cedula
 * @property string $lugexp
 * @property string $priape
 * @property string $segape
 * @property string $nombre
 * @property int $locnac
 * @property Carbon $fecnac
 * @property string $direccion
 * @property int $locdir
 * @property string $telefono
 * @property string $email
 * @property string $nit
 * @property string $nomemp
 * @property string $diremp
 * @property int $locemp
 * @property string $telemp
 * @property string $emaemp
 * @property int $locpro
 * @property int $codtra
 * @property int $codmot
 * @property string $hora
 * @property string $nota
 * @package App\Models
 */
	class Plasticine extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamTarjetasSeven
 *
 * @property int $cons
 * @property string $cod_tarjeta_b
 * @property string $cod_seven
 * @package App\Models
 */
	class ParamTarjetasSeven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estblo
 *
 * @property int $estblo
 * @property string $detalle
 * @package App\Models
 */
	class Estblo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Nitcon
 *
 * @property string $celini
 * @property string $celfin
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $hora
 * @property string $tabla
 * @property int $codigo
 * @package App\Models
 */
	class Nitcon extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Regtel
 *
 * @property int $id
 * @property Carbon $fecha
 * @property string $hora
 * @property int $numfol
 * @property string $descripcion
 * @property int $extension
 * @property string $duracion
 * @property string $telefono
 * @property float $valor
 * @property float $total
 * @property string $sync
 * @package App\Models
 */
	class Regtel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CrGuarantee
 *
 * @property int $id Identificador
 * @property string|null $type Código del tipo de garantia
 * @property string|null $code Código del tipo de tarjeta
 * @property string|null $number Número de la tarjeta
 * @property string|null $expire Expiración de la tarjeta
 * @property string|null $holder Nombre del tarjetabiente
 * @property string|null $amount Valor garantizado
 * @property string|null $currency Código de la moneda
 * @property string|null $numres Numero de la reserva
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereHolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereNumres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrGuarantee whereType($value)
 */
	class CrGuarantee extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaTiposContribuyente
 *
 * @property int $id
 * @property string $nombre
 * @package App\Models
 */
	class PtesaTiposContribuyente extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Pwsfactura
 *
 * @property int $cons
 * @property string $emp_codi
 * @property string $top_codi
 * @property string $abr_codc
 * @property string $abr_coda
 * @property string $abr_coss
 * @package App\Models
 */
	class Pwsfactura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipre
 *
 * @property int $tipres
 * @property string $detalle
 * @package App\Models
 */
	class Tipre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaTiposDocumentoElectronico
 *
 * @property int $id
 * @property string $nombre
 * @package App\Models
 */
	class PtesaTiposDocumentoElectronico extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ingpo
 *
 * @property int $id
 * @property int $salon_id
 * @property string $prefac
 * @property int $numfac
 * @property Carbon $fecha
 * @property string $cedula
 * @property int $forpag
 * @property float $valor
 * @package App\Models
 */
	class Ingpo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class AncCodpaiCobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @property string $RELACION
 * @property int $CODPAI
 * @package App\Models
 */
	class AncCodpaiCobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaNotaCredito
 *
 * @property int $id
 * @property string $prefijo
 * @property int $numero
 * @property string $request
 * @property string $response
 * @property string $codigoRespuesta
 * @property string $prefac
 * @property int $numfac
 * @package App\Models
 */
	class PtesaNotaCredito extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsReccadIngre
 *
 * @property int $cons
 * @property int $emp_codi
 * @property int $top_codi
 * @property string $mte_desc
 * @property string $mte_esta
 * @property string $ter_coda
 * @property string $cfl_codi
 * @property string $caj_codi
 * @property string $arb_cods
 * @property string $dst_codi
 * @package App\Models
 */
	class ParamWsReccadIngre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SegWsGroupsApp
 *
 * @property int $group_id
 * @property string $app_name
 * @property string $priv_access
 * @property string $priv_insert
 * @property string $priv_delete
 * @property string $priv_update
 * @property string $priv_export
 * @property string $priv_print
 * @property SegWsGroup $seg_ws_group
 * @property SegWsApp $seg_ws_app
 * @package App\Models
 */
	class SegWsGroupsApp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SmtpCuenta
 *
 * @property int $id_smtp_cuenta
 * @property string $server_smtp
 * @property string $encry_smtp
 * @property int $port_smtp
 * @property string $username_smtp
 * @property string $password_smtp
 * @property string $from_name_smtp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @package App\Models
 */
	class SmtpCuenta extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Esthab
 *
 * @property int $codest
 * @property string $detalle
 * @property string $color
 * @package App\Models
 */
	class Esthab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SegWsApp
 *
 * @property string $app_name
 * @property string $app_type
 * @property string $description
 * @property Collection|SegWsGroupsApp[] $seg_ws_groups_apps
 * @package App\Models
 */
	class SegWsApp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipdoc
 *
 * @property int $tipdoc
 * @property string $detalle
 * @property string $tipcoa
 * @property int $tipint
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipdoc whereDetalle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipdoc whereTipcoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipdoc whereTipdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipdoc whereTipint($value)
 */
	class Tipdoc extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Sucursal
 *
 * @property int $codsuc
 * @property string $nit
 * @property string $nombre
 * @package App\Models
 */
	class Sucursal extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plade
 *
 * @property int $numfol
 * @property int $codpla
 * @property int $codcar
 * @property string $tipo
 * @property float $valor
 * @package App\Models
 */
	class Plade extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaTiposEstablecimiento
 *
 * @property string $id
 * @property string $nombre
 * @package App\Models
 */
	class PtesaTiposEstablecimiento extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cxcseven
 *
 * @property int $cons
 * @property int $cxcseven
 * @property string $prefac
 * @property int $numfac
 * @property float $saldo
 * @property Carbon $fecfac
 * @property Carbon $fecvev
 * @property float $abono
 * @property Carbon $fecprocesa
 * @property string $estado
 * @property int $numrecseven
 * @property int $bnumrec
 * @property string $clidoc
 * @package App\Models
 */
	class Cxcseven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Dic31cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Dic31cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RecdSeven
 *
 * @property int $cons
 * @property string $brec
 * @property string $rec_seven
 * @property Carbon $fechac
 * @package App\Models
 */
	class RecdSeven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Indnac
 *
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codcar
 * @property int $codadm
 * @property string $valfij
 * @package App\Models
 */
	class Indnac extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsReccadVForpag
 *
 * @property int $cons
 * @property int $forma
 * @property int $forpag
 * @property int $tac_codi
 * @property int $ban_codi
 * @property int $dfo_chec
 * @property string $dfo_nocu
 * @property string $dfo_chep
 * @property string $dfo_cedu
 * @property string $dfo_nomg
 * @property string $dfo_clav
 * @property float $dfo_base
 * @package App\Models
 */
	class ParamWsReccadVForpag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Clientescobertura
 *
 * @property int $cons
 * @property string $tipdoc
 * @property string $numdoc
 * @property Carbon $fecha
 * @package App\Models
 */
	class Clientescobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Softupd
 *
 * @property int $id
 * @property string $reference
 * @property int $fecha
 * @property int $usize
 * @package App\Models
 */
	class Softupd extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Concot
 *
 * @property int $id
 * @property string $encabezado
 * @property string $politicas
 * @property string $firma
 * @package App\Models
 */
	class Concot extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plaapl
 *
 * @property int $id
 * @property int $numfol
 * @property Carbon $fecha
 * @property int $codpla
 * @package App\Models
 */
	class Plaapl extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Clacar
 *
 * @property int $codcar
 * @property string $detalle
 * @package App\Models
 */
	class Clacar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Venpo
 *
 * @property int $id
 * @property int $salon_id
 * @property string $prefac
 * @property int $numfac
 * @property Carbon $fecha
 * @property string $cedula
 * @property int $codcar
 * @property int $menus_items_id
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $total
 * @package App\Models
 */
	class Venpo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Serspa
 *
 * @property int $codser
 * @property string $nombre
 * @property string $duracion
 * @property string $estado
 * @package App\Models
 */
	class Serspa extends \Eloquent {}
}

namespace App\Models{
/**
 * Class LogAnulaReccaj
 *
 * @property int $cons
 * @property string $b_doc
 * @property string $seven_doc
 * @property int $retorno
 * @property string $error
 * @property Carbon $fecha_proceso
 * @package App\Models
 */
	class LogAnulaReccaj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plares
 *
 * @property int $numres
 * @property int $numpla
 * @property int $codpla
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property int $pordes
 * @property string $tipdes
 * @property float $subsidio
 * @property int $valor
 * @property int $valornoche
 * @package App\Models
 * @property string|null $codigocr
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereCodigocr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereCodpla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereFecfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereFecini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereNumpla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereNumres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares wherePordes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereTipdes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Plares whereValornoche($value)
 */
	class Plares extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Transporte
 *
 * @property int $codtra
 * @property string $nombre
 * @property string $predeterminado
 * @package App\Models
 */
	class Transporte extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Photo
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $uri
 * @property int $position
 * @package App\Models
 */
	class Photo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamNota
 *
 * @property int $con
 * @property string $prenot
 * @property int $nota
 * @package App\Models
 */
	class ParamNota extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaTiposIdentificacion
 *
 * @property int $id
 * @property string $nombre
 * @package App\Models
 */
	class PtesaTiposIdentificacion extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perse
 *
 * @property int $id
 * @property int $numfol
 * @property string $clave
 * @property string $enaper
 * @property string $pueout
 * @property string $pueabo
 * @property int $codusu
 * @property Carbon $fecha
 * @package App\Models
 */
	class Perse extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detint
 *
 * @property int $codigo
 * @property int $numpla
 * @property int $codpla
 * @package App\Models
 */
	class Detint extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Salafa
 *
 * @property string $nit
 * @property int $numfac
 * @property Carbon $fecha
 * @property float $valor
 * @package App\Models
 */
	class Salafa extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Datcor
 *
 * @property int $id
 * @property string $servidor
 * @property string $usuario
 * @property string $clave
 * @package App\Models
 */
	class Datcor extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Reservag
 *
 * @property int $numres
 * @property string $nomgru
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nit
 * @property string $nitage
 * @property int $locpro
 * @property int $codpai
 * @property int $codciu
 * @property int $locdes
 * @property int $paides
 * @property int $ciudes
 * @property float $pordes
 * @property int $codtra
 * @property int $trasal
 * @property int $codmot
 * @property int $tipres
 * @property int $codcan
 * @property Carbon $fecres
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $hora
 * @property string $observacion
 * @property int $numrec
 * @property int $forpag
 * @property string $estado
 * @property string $tippro
 * @property string $tipgar
 * @property int $codven
 * @property string $idresweb
 * @property string $idcanal
 * @property string $idclifre
 * @package App\Models
 */
	class Reservag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Enccal
 *
 * @property int $enccal
 * @property string $detalle
 * @package App\Models
 */
	class Enccal extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Preopec
 *
 * @property string $codigo
 * @property string $nombre
 * @package App\Models
 */
	class Preopec extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Gruper
 *
 * @property int $codgru
 * @property string $nombre
 * @package App\Models
 */
	class Gruper extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsReccajIDetum
 *
 * @property int $cons_reccaj_i_deta
 * @property int $codcar
 * @property string $area
 * @property string $centro_costo
 * @property string $sucursal
 * @property string $proyecto
 * @property string $cuenta_inve
 * @property string $cuenta_costo
 * @property int $concepto
 * @property string $codigo_producto
 * @property string $codigo_destino
 * @property string $grabador
 * @property Carbon $fecha_graba
 * @property string $estado
 * @package App\Models
 */
	class ParamWsReccajIDetum extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Resfac
 *
 * @property int $id
 * @property string $nombre
 * @property string $resfac
 * @property Carbon $fecfac
 * @property string $prefac
 * @property int $numfac
 * @property int $numfai
 * @property int $numfaf
 * @property string $estado
 * @property string $notas
 * @property string $tipofactura
 * @package App\Models
 */
	class Resfac extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Depart
 *
 * @property string $coddep
 * @property string $nombre
 * @package App\Models
 */
	class Depart extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tracar
 *
 * @property int $folini
 * @property int $cueini
 * @property int $iteini
 * @property int $folfin
 * @property int $cuefin
 * @property int $itefin
 * @property int $codusu
 * @property Carbon $fecsis
 * @property Carbon $fecha
 * @property string $hora
 * @property int $codcar
 * @property string $cladoc
 * @property string $numdoc
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $valter
 * @property float $total
 * @package App\Models
 */
	class Tracar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estahabman
 *
 * @property int $ano
 * @property int $mes
 * @property int $habven
 * @property int $habcom
 * @property int $numaduv
 * @property int $numninv
 * @property int $numaduc
 * @property int $numninc
 * @package App\Models
 */
	class Estahabman extends \Eloquent {}
}

namespace App\Models{
/**
 * Class LogAnulaReccad
 *
 * @property int $cons
 * @property string $b_doc
 * @property string $seven_doc
 * @property int $retorno
 * @property string $error
 * @property Carbon $fecha_proceso
 * @package App\Models
 */
	class LogAnulaReccad extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estaprd
 *
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $codpla
 * @property int $tippro
 * @property string $tipper
 * @property int $numadu
 * @property int $numnin
 * @property int $numinf
 * @property float $valor
 * @package App\Models
 */
	class Estaprd extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cirpag
 *
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property string $token
 * @property int $codusu
 * @property float $saldo
 * @property string $url
 * @property Carbon $created_at
 * @property Carbon $modified_in
 * @property string $estado
 * @package App\Models
 */
	class Cirpag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Paramintneg
 *
 * @property string $codparam
 * @property string $id_hotel
 * @property string $sistema
 * @property string $medio_envio
 * @property string $email_destino
 * @property string $server_ftp
 * @property string $user_ftp
 * @property string $password_ftp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @package App\Models
 */
	class Paramintneg extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Carlim
 *
 * @property int $numfol
 * @property int $numcue
 * @property int $codgru
 * @property string $tipo
 * @property float $limite
 * @property int $cuedes
 * @package App\Models
 */
	class Carlim extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Apofol
 *
 * @property int $numfol
 * @property int $numero
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nombre
 * @property string $lugexp
 * @property int $codnac
 * @property int $locnac
 * @property int $codpro
 * @property string $sexo
 * @property Carbon $fecnac
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $estado
 * @package App\Models
 */
	class Apofol extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ach
 *
 * @property int $id
 * @property int $id_ws
 * @property float $valor
 * @property string $documento
 * @property string $correo
 * @property float $iva
 * @property string $referencia
 * @property string $estado
 * @property string $returncode
 * @property string $errormessage
 * @property string $state
 * @property string $amount
 * @property string $vatamount
 * @property string $bankcode
 * @property string $bankname
 * @property string $trazabilitycode
 * @property string $cyclenumber
 * @package App\Models
 */
	class Ach extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SecGroup
 *
 * @property int $group_id
 * @property string $description
 * @property Collection|SecGroupsApp[] $sec_groups_apps
 * @property Collection|SecUsersGroup[] $sec_users_groups
 * @package App\Models
 */
	class SecGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detcar
 *
 * @property int $id
 * @property int $carpla_id
 * @property int $numfol
 * @property int $codpla
 * @property Carbon $fecha
 * @property int $numcue
 * @property int $item
 * @package App\Models
 */
	class Detcar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Moteve
 *
 * @property int $moteve
 * @property string $detalle
 * @package App\Models
 */
	class Moteve extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Objold
 *
 * @property int $id
 * @property string $cedula
 * @property Carbon $fecha
 * @property int $codtip
 * @property int $codcam
 * @property int $codusu
 * @property Carbon $fecent
 * @property int $usuent
 * @property string $observaciones
 * @property string $estado
 * @package App\Models
 */
	class Objold extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Feb02cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Feb02cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaContratosMandato
 *
 * @property string $numcont
 * @property string $razsoc
 * @property int $tipdoc
 * @property string $numdoc
 * @property string $nummat
 * @property int $estado
 * @package App\Models
 */
	class PtesaContratosMandato extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SecGroupsApp
 *
 * @property int $group_id
 * @property string $app_name
 * @property string $priv_access
 * @property string $priv_insert
 * @property string $priv_delete
 * @property string $priv_update
 * @property string $priv_export
 * @property string $priv_print
 * @property SecGroup $sec_group
 * @property SecApp $sec_app
 * @package App\Models
 */
	class SecGroupsApp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Indcel
 *
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codadm
 * @property int $codcar
 * @package App\Models
 */
	class Indcel extends \Eloquent {}
}

namespace App\Models{
/**
 * Class AmcCobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @property string $RELACION
 * @property int $CODPAI
 * @package App\Models
 */
	class AmcCobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Notify
 *
 * @property int $id
 * @property int $codusu
 * @property string $keyname
 * @property string $option1
 * @package App\Models
 */
	class Notify extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Procod
 *
 * @property int $codpro
 * @property int $codint
 * @property string $nit
 * @property string $codigo
 * @property int $pordes
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @package App\Models
 */
	class Procod extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cargo
 *
 * @property int $codcar
 * @property string $descripcion
 * @property string $tipmov
 * @property string $coddep
 * @property int $codgru
 * @property int $gruest
 * @property string $cueven
 * @property string $interf
 * @property string $movven
 * @property string $codcen
 * @property string $incbas
 * @property string $ivainc
 * @property float $poriva
 * @property string $cueiva
 * @property string $ceniva
 * @property float $porimp
 * @property string $cueimp
 * @property string $cenimp
 * @property float $porser
 * @property string $cueser
 * @property string $censer
 * @property string $ingter
 * @property float $porcos
 * @property string $cueter
 * @property string $center
 * @property string $cree
 * @property string $afehue
 * @property string $muecaj
 * @property string $descaj
 * @property string $comcon
 * @property string $ajuiva
 * @property string $ajuimp
 * @property string $ajuser
 * @property string $estado
 * @property string $subsidio
 * @package App\Models
 */
	class Cargo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ayuda
 *
 * @property int $id
 * @property string $aaction
 * @property string $titulo
 * @property string $texto
 * @package App\Models
 */
	class Ayuda extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Scheduler
 *
 * @property int $id
 * @property int $timestart
 * @property int $events_id
 * @property int $codusu
 * @property string $tipo
 * @property string $status
 * @package App\Models
 */
	class Scheduler extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Motcan
 *
 * @property int $motcan
 * @property string $detalle
 * @package App\Models
 */
	class Motcan extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaRangonota
 *
 * @property int $id
 * @property int $numeroacionFinalC
 * @property int $numeracionInicialC
 * @property string $prefijoC
 * @property int $numeroacionFinalD
 * @property int $numeracionInicialD
 * @property string $prefijoD
 * @package App\Models
 */
	class PtesaRangonota extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaCodigosError
 *
 * @property int $id
 * @property string $nombre
 * @package App\Models
 */
	class PtesaCodigosError extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Novrep
 *
 * @property int $id
 * @property int $codusu
 * @property int $fecha
 * @property string $texto
 * @package App\Models
 */
	class Novrep extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estahab
 *
 * @property Carbon $fecha
 * @property int $habven
 * @property int $habcom
 * @property int $numaduv
 * @property int $numninv
 * @property int $numaduc
 * @property int $numninc
 * @package App\Models
 */
	class Estahab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tippro
 *
 * @property int $tippro
 * @property string $detalle
 * @property string $genest
 * @package App\Models
 */
	class Tippro extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tragar
 *
 * @property int $resini
 * @property int $resfin
 * @property string $celini
 * @property string $celfin
 * @property int $numrec
 * @property Carbon $fecha
 * @property string $hora
 * @property int $codusu
 * @package App\Models
 */
	class Tragar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Corfac
 *
 * @property int $id
 * @property string $preini
 * @property int $numini
 * @property int $folini
 * @property string $prefin
 * @property int $numfin
 * @property int $folfin
 * @property string $tipo
 * @property Carbon $fecha
 * @property string $hora
 * @property int $codusu
 * @property string $estado
 * @package App\Models
 */
	class Corfac extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tarcre
 *
 * @property int $id
 * @property int $numres
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $tipo
 * @property string $numero
 * @property string $numero_mask
 * @property string $nombre
 * @property string $grupal
 * @package App\Models
 */
	class Tarcre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Conemp
 *
 * @property string $nit
 * @property string $observacion
 * @package App\Models
 */
	class Conemp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MagentaFile
 *
 * @property int $id
 * @property int $issues_id
 * @property string $filename
 * @property string $content_type
 * @property string $path
 * @package App\Models
 */
	class MagentaFile extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Aura
 *
 * @property Carbon $fecha
 * @property string $tipo
 * @property string $comprob
 * @property int $numero
 * @package App\Models
 */
	class Aura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cirenv
 *
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $email
 * @property string $mailuid
 * @property string $diainf
 * @property Carbon $fecent
 * @property string $estado
 * @package App\Models
 */
	class Cirenv extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perin
 *
 * @property int $id
 * @property int $numfol
 * @property Carbon $fecha
 * @property int $codusu
 * @property string $email
 * @property string $mailuid
 * @property Carbon $fecent
 * @property string $diainf
 * @property string $estado
 * @package App\Models
 */
	class Perin extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Feb04cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Feb04cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Concue
 *
 * @property int $numfol
 * @property int $codcar
 * @property int $numcue
 * @package App\Models
 */
	class Concue extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Planilla
 *
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property int $numfol
 * @property int $numcue
 * @property string $nomcad
 * @property string $nithot
 * @property string $hotel
 * @property string $resfac
 * @property int $numini
 * @property int $numfin
 * @property Carbon $fecfac
 * @property string $horfac
 * @property string $nombre
 * @property int $tipdoc
 * @property string $cedula
 * @property string $numhab
 * @property int $dif
 * @property string $direccion
 * @property string $ciudad
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $caja
 * @property string $planes
 * @property string $huesped
 * @property string $empresa
 * @property int $numadu
 * @property int $numnin
 * @property float $tocanogr
 * @property float $tocagr
 * @property float $tocagr16
 * @property float $tocagr10
 * @property float $totiva16
 * @property float $totiva10
 * @property float $totiva
 * @property float $totabo
 * @property float $total
 * @property float $saldo
 * @property float $basret
 * @property float $propina
 * @property int $codusu
 * @property string $svf
 * @property string $estado
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereBasret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereCaja($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereCedula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereCodusu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereDif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereFecfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereFeclle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereFecsal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereHorfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereHotel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereHuesped($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNithot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNomcad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumadu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumcue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumfol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumhab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereNumnin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla wherePlanes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla wherePrefac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla wherePropina($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereResfac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereSvf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTipdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTocagr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTocagr10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTocagr16($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTocanogr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTotabo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTotiva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTotiva10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Planilla whereTotiva16($value)
 */
	class Planilla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Confre
 *
 * @property int $id
 * @property int $numres
 * @property Carbon $fecha
 * @property int $codusu
 * @property string $email
 * @property string $carfec
 * @property string $encabezado
 * @property string $saludo
 * @property string $datos
 * @property string $polcan
 * @property string $polnoshow
 * @property string $costos
 * @property string $horas
 * @property string $notas
 * @property string $firma
 * @property string $mailuid
 * @property Carbon $fecent
 * @property string $diainf
 * @property string $estado
 * @package App\Models
 */
	class Confre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmopo
 *
 * @property int $id
 * @property string $tipcli
 * @property string $nombre
 * @property Carbon $fecexp
 * @property string $estado
 * @property int $probab
 * @property int $codusu
 * @property string $nota
 * @package App\Models
 */
	class Crmopo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Indloc
 *
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codadm
 * @property int $codcar
 * @property string $valfij
 * @package App\Models
 */
	class Indloc extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ParamWsReccajVDetum
 *
 * @property int $cons_reccaj_v_deta
 * @property int $codcar
 * @property string $area
 * @property string $centro_costo
 * @property string $sucursal
 * @property string $proyecto
 * @property string $cuenta_inve
 * @property string $cuenta_costo
 * @property int $concepto
 * @property string $codigo_producto
 * @property string $codigo_destino
 * @property string $grabador
 * @property Carbon $fecha_graba
 * @property string $estado
 * @package App\Models
 */
	class ParamWsReccajVDetum extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaInforut
 *
 * @property int $id
 * @property string $barrio
 * @property string $ciudad
 * @property string $correoElectronico
 * @property string $departamento
 * @property string $digitoVerificacion
 * @property string $direccion
 * @property string $nit
 * @property string $nombreComercial
 * @property string $pais
 * @property string $razonSocial
 * @property string $responsabilidades
 * @property string $tipoContribuyente
 * @property string $tipoRegimen
 * @property string $usuarioAduanero
 * @package App\Models
 */
	class PtesaInforut extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CrBooker
 *
 * @property int $id Identificador
 * @property string|null $givenname Nombres
 * @property string|null $surname Apellido
 * @property string|null $phone Teléfono
 * @property string|null $email Correo electrónico
 * @property string|null $address Dirección
 * @property string|null $city Ciudad
 * @property string|null $postal_code Código postal
 * @property string|null $country Pais
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CrBookerReserva[] $reservas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereGivenname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBooker whereSurname($value)
 */
	class CrBooker extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Carpla
 *
 * @property int $id
 * @property int $numfol
 * @property int $codpla
 * @property Carbon $fecha
 * @property int $numcue
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $hora
 * @property int $codusu
 * @property string $estado
 * @package App\Models
 */
	class Carpla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmemacam
 *
 * @property int $id
 * @property int $codcam
 * @property string $subject
 * @property string $image_key
 * @property string $url
 * @property string $texto
 * @package App\Models
 */
	class Crmemacam extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Pine
 *
 * @property int $id
 * @property string $codigo
 * @property string $estado
 * @package App\Models
 */
	class Pine extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Evento
 *
 * @property int $codeve
 * @property string $referencia
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nit
 * @property int $tipeve
 * @property int $codsal
 * @property int $codseg
 * @property Carbon $fecreg
 * @property Carbon $fecha
 * @property string $horini
 * @property string $horfin
 * @property Carbon $feclim
 * @property int $codusu
 * @property int $numper
 * @property string $responsable
 * @property string $forpag
 * @property string $nota
 * @property string $carta
 * @property string $estado
 * @package App\Models
 */
	class Evento extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaFactura
 *
 * @property int $id
 * @property int $creacion
 * @property int $ultimaOperacion
 * @property string $request
 * @property string $codigoRespuesta
 * @property string $mensajeRespuesta
 * @property string $contenidoCodigoQR
 * @property string $cufe
 * @property string $numeroDocumentoGenerado
 * @property string $ublToString
 * @property int $numfac
 * @property string $prefac
 * @property int $numfol
 * @property string $estado
 * @property string $rg_codigoRespuesta
 * @property string $rg_mensajeRespuesta
 * @property string $rg_request
 * @property boolean $rq_pdf
 * @package App\Models
 */
	class PtesaFactura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ciudade
 *
 * @property int $codciu
 * @property int $codpai
 * @property string $nombre
 * @property int $coddane
 * @property int $location_id
 * @package App\Models
 */
	class Ciudade extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Wsparam
 *
 * @property string $toc_codi_fac
 * @property string $emp_codi
 * @property string $cim_codi
 * @property string $list_codi
 * @property string $tip_doc
 * @package App\Models
 */
	class Wsparam extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Sereve
 *
 * @property int $codser
 * @property string $nombre
 * @property string $estado
 * @package App\Models
 */
	class Sereve extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Categorium
 *
 * @property string $codigo
 * @property string $detalle
 * @package App\Models
 */
	class Categorium extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Factura
 *
 * @property string $prefac
 * @property int $numfac
 * @property int $numfol
 * @property int $numcue
 * @property string $nomcad
 * @property string $nithot
 * @property string $hotel
 * @property string $resfac
 * @property Carbon $fecres
 * @property int $numini
 * @property int $numfin
 * @property string $notreg
 * @property string $notica
 * @property Carbon $fecfac
 * @property string $horfac
 * @property string $nombre
 * @property int $tipdoc
 * @property string $cedula
 * @property string $numhab
 * @property int $dif
 * @property string $direccion
 * @property string $ciudad
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $caja
 * @property string $planes
 * @property string $huesped
 * @property string $empresa
 * @property int $numadu
 * @property int $numnin
 * @property float $tocanogr
 * @property float $tocagr
 * @property float $tocagr8
 * @property float $tocagr16
 * @property float $tocagr10
 * @property float $totiva16
 * @property float $totiva10
 * @property float $totiva
 * @property float $totimp
 * @property float $totabo
 * @property float $total
 * @property float $saldo
 * @property float $basret
 * @property float $propina
 * @property string $nota
 * @property string $formas
 * @property Carbon $fecven
 * @property Carbon $fecgen
 * @property string $tipres
 * @property string $facalo
 * @property string $quien
 * @property int $genusu
 * @property int $canfac
 * @property int $codusu
 * @property string $svf
 * @property string $estado
 * @property float $totalsubsidio
 * @package App\Models
 */
	class Factura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Novman
 *
 * @property int $id
 * @property int $novrep_id
 * @property int $codusu
 * @package App\Models
 */
	class Novman extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Log
 *
 * @property int $id
 * @property string $data
 * @package App\Models
 */
	class Log extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Apore
 *
 * @property int $numres
 * @property int $numero
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nombre
 * @property string $lugexp
 * @property int $codnac
 * @property int $locnac
 * @property int $codpro
 * @property string $sexo
 * @property Carbon $fecnac
 * @package App\Models
 */
	class Apore extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmlist
 *
 * @property int $id
 * @property string $nombre
 * @property string $tipo
 * @package App\Models
 */
	class Crmlist extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaTipoDocumentoConversion
 *
 * @property int $id
 * @property int $ptesa_tipo_documento
 * @property int $hotel_tipo_documento
 * @package App\Models
 */
	class PtesaTipoDocumentoConversion extends \Eloquent {}
}

namespace App\Models{
/**
 * Class DatosCarvajal
 *
 * @property int $cons
 * @property string $ENC_1
 * @property string $ENC_4
 * @property string $ENC_5
 * @property int $ENC_9
 * @property string $ENC_10
 * @property int $EMI_1
 * @property string $TAC_1
 * @property string $TIM_1
 * @property string $CTS_1
 * @property string $estado
 * @package App\Models
 */
	class DatosCarvajal extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Atehue
 *
 * @property int $codate
 * @property string $detalle
 * @package App\Models
 */
	class Atehue extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SegWsUsersGroup
 *
 * @property string $login
 * @property int $group_id
 * @property SegWsUser $seg_ws_user
 * @property SegWsGroup $seg_ws_group
 * @package App\Models
 */
	class SegWsUsersGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Ene21cobertura
 *
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 * @package App\Models
 */
	class Ene21cobertura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CiudadesDian
 *
 * @property int $id
 * @property string $codCiudad
 * @property string $codDepto
 * @property string $codPais
 * @property string $nombre_ciudad
 * @property string $nombre_depto
 * @property string $nombre_pais
 * @property string $abreviatura_pais
 * @package App\Models
 */
	class CiudadesDian extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perfil
 *
 * @property int $codprf
 * @property string $detalle
 * @package App\Models
 */
	class Perfil extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Parseven
 *
 * @property int $codcar
 * @property string $pro_codi
 * @package App\Models
 */
	class Parseven extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Habpla
 *
 * @property string $numhab
 * @property string $piso
 * @property int $x1
 * @property int $y1
 * @property int $x2
 * @property int $y2
 * @property int $width
 * @property int $height
 * @package App\Models
 */
	class Habpla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Habimg
 *
 * @property string $piso
 * @property string $detalle
 * @property string $img
 * @package App\Models
 */
	class Habimg extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Mesre
 *
 * @property int $numres
 * @property int $numero
 * @property string $mensaje
 * @property Carbon $fecha
 * @property string $hora
 * @property string $nomper
 * @property string $telper1
 * @property string $telper2
 * @package App\Models
 */
	class Mesre extends \Eloquent {}
}

namespace App\Models{
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
 * @package App\Models
 * @property string|null $guarantee Garantia de la reserva en linea
 * @property string|null $onlinecomment Comenrtario de la reserva en linea
 * @property string|null $cancellationid ID de la cancelación de la reserva en línea
 * @property string|null $modifyid ID de la ultima modificacion
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCancellationid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCarta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCedula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCodcan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCodciu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCodpai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCodtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCodusu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereCodven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereConfirmationid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereFecest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereFeclim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereFeclle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereFecres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereFecsal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereForpag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereGuarantee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereHabfij($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereIdcanal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereIdclifre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereIdresweb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereLocpro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereModifyid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNitage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNumadu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNumgru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNumhab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNuminf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNumnin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNumpre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereNumres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereOnlinecomment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva wherePordes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereReembl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereReferencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereSolicitada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereTipdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereTipgar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereTippro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereTipres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereTipseg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reserva whereTrasal($value)
 */
	class Reserva extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Profesion
 *
 * @property int $codpro
 * @property string $nombre
 * @property string $predeterminado
 * @package App\Models
 */
	class Profesion extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Gruint
 *
 * @property int $gruint
 * @property string $nombre
 * @property string $descripcion
 * @package App\Models
 */
	class Gruint extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Carhab
 *
 * @property string $numhab
 * @property int $numcar
 * @property int $codcar
 * @property string $observacion
 * @property string $viscar
 * @package App\Models
 */
	class Carhab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cartel
 *
 * @property int $id
 * @property Carbon $fecha
 * @property string $hora
 * @property string $descripcion
 * @property int $ext
 * @property string $numhab
 * @property string $duracion
 * @property string $telefono
 * @property float $valmin
 * @package App\Models
 */
	class Cartel extends \Eloquent {}
}

namespace App\Models{
/**
 * Class LogReccadIngre
 *
 * @property int $cons
 * @property string $brec
 * @property string $rec_seven
 * @property string $error
 * @property string $proceso
 * @property Carbon $fecha_procesa
 * @property string $tipo_ingreso
 * @property string $login
 * @package App\Models
 */
	class LogReccadIngre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Fecesp
 *
 * @property int $id
 * @property int $mes
 * @property int $dia
 * @property string $nombre
 * @property string $estado
 * @property int $mesf
 * @property int $diaf
 * @property int $year
 * @package App\Models
 */
	class Fecesp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estapla
 *
 * @property Carbon $fecha
 * @property int $tippla
 * @property int $unidad
 * @property float $venta
 * @package App\Models
 */
	class Estapla extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detfac
 *
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property int $item
 * @property int $codcar
 * @property string $fecha
 * @property string $concepto
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $servicio
 * @property float $terceros
 * @property float $total
 * @property float $abonos
 * @property float $saldo
 * @property float $subsidio
 * @package App\Models
 */
	class Detfac extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Pref
 *
 * @property int $codusu
 * @property string $key_name
 * @property string $value
 * @package App\Models
 */
	class Pref extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipcue
 *
 * @property int $numcue
 * @property string $detalle
 * @package App\Models
 */
	class Tipcue extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Encpre
 *
 * @property int $encpre
 * @property string $pregunta
 * @package App\Models
 */
	class Encpre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Recegr
 *
 * @property int $numegr
 * @property string $cedula
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $telefono
 * @property Carbon $fecha
 * @property int $codcaj
 * @property int $codusu
 * @property int $codcar
 * @property int $codven
 * @property string $nota
 * @property string $estado
 * @package App\Models
 */
	class Recegr extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Perabo
 *
 * @property int $id
 * @property int $numfol
 * @property string $cedula
 * @property string $token
 * @property string $ipaddress
 * @property Carbon $created_at
 * @property Carbon $modified_in
 * @property string $estado
 * @package App\Models
 */
	class Perabo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tarcrein
 *
 * @property int $id
 * @property int $numfol
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $tipo
 * @property string $numero
 * @property string $numero_mask
 * @property int $codseg
 * @property Carbon $fecven
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $codigo_postal
 * @property string $pais
 * @property string $telefono
 * @property string $observaciones
 * @package App\Models
 */
	class Tarcrein extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmreclist
 *
 * @property int $id
 * @property int $crmlists_id
 * @property string $cedula
 * @package App\Models
 */
	class Crmreclist extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Empcon
 *
 * @property int $id
 * @property string $uuid
 * @property string $nit
 * @property string $tipo
 * @property string $nombre
 * @property string $cargo
 * @property string $celular
 * @property string $telefono
 * @property string $email
 * @property string $estado
 * @package App\Models
 */
	class Empcon extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Placaj
 *
 * @property int $codigo
 * @property int $codpla
 * @property string $temporada
 * @property string $categoria
 * @package App\Models
 */
	class Placaj extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Parambhstr
 *
 * @property string $codparam
 * @property string $id_hotel
 * @property string $send_email
 * @property string $email_destino
 * @property string $send_ftp
 * @property string $server_ftp
 * @property string $user_ftp
 * @property string $password_ftp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @package App\Models
 */
	class Parambhstr extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Acteco
 *
 * @property int $codact
 * @property string $nombre
 * @package App\Models
 */
	class Acteco extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Salone
 *
 * @property int $codsal
 * @property string $abrev
 * @property string $nombre
 * @property int $antmet
 * @property int $larmet
 * @property string $nota
 * @property string $estado
 * @package App\Models
 */
	class Salone extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Taremp
 *
 * @property string $nit
 * @property int $codpla
 * @property int $numero
 * @package App\Models
 */
	class Taremp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Clahab
 *
 * @property int $codcla
 * @property string $clase
 * @property string $descripcion
 * @property string $observacion
 * @property string $uri
 * @property int $numper
 * @property int $tiphab
 * @package App\Models
 */
	class Clahab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipcanre
 *
 * @property int $codcan
 * @property string $detalle
 * @package App\Models
 */
	class Tipcanre extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipgar
 *
 * @property int $tipgar
 * @property string $detalle
 * @package App\Models
 */
	class Tipgar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Protect
 *
 * @property int $id
 * @property int $codusu
 * @property string $source
 * @property string $field
 * @property string $value
 * @package App\Models
 */
	class Protect extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Mothab
 *
 * @property int $mothab
 * @property string $detalle
 * @package App\Models
 */
	class Mothab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Folio
 *
 * @property int $numfol
 * @property int $numres
 * @property int $codeve
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nit
 * @property string $nitage
 * @property int $locpro
 * @property int $codpai
 * @property int $codciu
 * @property int $paides
 * @property int $locdes
 * @property int $ciudes
 * @property int $codtra
 * @property int $trasal
 * @property int $codmot
 * @property string $numhab
 * @property int $usuout
 * @property int $codusu
 * @property Carbon $fecres
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $hora
 * @property string $horsal
 * @property int $numadu
 * @property int $numnin
 * @property int $numinf
 * @property string $nota
 * @property string $notaayb
 * @property string $equipaje
 * @property string $placa
 * @property string $trahot
 * @property int $estpai
 * @property string $corregir
 * @property int $forpag
 * @property string $estado
 * @property string $walkin
 * @property string $tippro
 * @property string $tipgar
 * @property int $codven
 * @property string $idresweb
 * @property string $idcanal
 * @property string $idclifre
 * @property string $firma
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCedula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCiudes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodciu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodeve($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodmot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodpai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodusu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCodven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereCorregir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereEquipaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereEstpai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereFeclle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereFecres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereFecsal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereFirma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereForpag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereHorsal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereIdcanal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereIdclifre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereIdresweb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereLocdes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereLocpro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNitage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNotaayb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNumadu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNumfol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNumhab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNuminf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNumnin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereNumres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio wherePaides($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio wherePlaca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereTipdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereTipgar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereTippro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereTrahot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereTrasal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereUsuout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Folio whereWalkin($value)
 */
	class Folio extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Encuesta
 *
 * @property int $id
 * @property string $nombre
 * @property string $url
 * @property string $tipo
 * @property string $asunto
 * @property string $mensaje
 * @property string $estado
 * @package App\Models
 */
	class Encuesta extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plafolh
 *
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $numpla
 * @property int $codpla
 * @property string $tipper
 * @property int $numper
 * @property string $adicional
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @package App\Models
 */
	class Plafolh extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Chat
 *
 * @property int $id
 * @property int $usuone
 * @property int $usutwo
 * @property int $ususay
 * @property int $datemes
 * @property string $message
 * @property string $status
 * @package App\Models
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Resspa
 *
 * @property int $id
 * @property string $referencia
 * @property string $cedula
 * @property int $codest
 * @property string $horini
 * @property string $horfin
 * @property string $estado
 * @package App\Models
 */
	class Resspa extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estapld
 *
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $codpla
 * @property int $tippla
 * @property string $tipper
 * @property int $numadu
 * @property int $numnin
 * @property int $numinf
 * @property float $valor
 * @package App\Models
 */
	class Estapld extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmcamp
 *
 * @property int $codcam
 * @property string $nombre
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $tipo
 * @property float $presupuesto
 * @property float $ganancia
 * @property string $objetivos
 * @property string $descripcion
 * @property float $costo
 * @property float $cosesp
 * @property string $estado
 * @package App\Models
 */
	class Crmcamp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Plafec
 *
 * @property int $codpla
 * @property int $codcla
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $observacion
 * @package App\Models
 */
	class Plafec extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Indint
 *
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codadm
 * @property int $codcar
 * @package App\Models
 */
	class Indint extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SevenForpag
 *
 * @property int $cons
 * @property int $forpag
 * @property string $deatalle
 * @property int $seven_forpag
 * @property string $tac_codi
 * @property string $ban_codi
 * @package App\Models
 */
	class SevenForpag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class LogFactReccad
 *
 * @property int $cons
 * @property string $bfac
 * @property string $fac_seven
 * @property string $fac_cont
 * @property Carbon $fecha_procesa
 * @property string $proceso
 * @property string $login
 * @package App\Models
 */
	class LogFactReccad extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Carrem
 *
 * @property int $id
 * @property string $texto
 * @package App\Models
 */
	class Carrem extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Paise
 *
 * @property int $codpai
 * @property string $nombre
 * @package App\Models
 */
	class Paise extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Percar
 *
 * @property int $codigo
 * @property int $codprf
 * @property int $codcar
 * @property string $tipo
 * @package App\Models
 */
	class Percar extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Blohab
 *
 * @property int $codblo
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property Carbon $fecdes
 * @property string $numhab
 * @property int $estblo
 * @property int $motdes
 * @property string $nota
 * @package App\Models
 */
	class Blohab extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Broadcast
 *
 * @property int $id
 * @property int $codusu
 * @property string $message
 * @property string $sended
 * @package App\Models
 */
	class Broadcast extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detegr
 *
 * @property int $numegr
 * @property int $numero
 * @property int $forpag
 * @property int $numfor
 * @property Carbon $fecven
 * @property float $ivarep
 * @property float $valorm
 * @property float $valor
 * @package App\Models
 */
	class Detegr extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Encpregru
 *
 * @property int $encpregru
 * @property int $encgru
 * @property string $pregunta
 * @package App\Models
 */
	class Encpregru extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CxcSevenlog
 *
 * @property int $cons
 * @property string $bfac
 * @property string $cxcws
 * @property Carbon $fechac
 * @package App\Models
 */
	class CxcSevenlog extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Caneve
 *
 * @property int $codcan
 * @property int $codeve
 * @property Carbon $feccan
 * @property int $moteve
 * @property string $descripcion
 * @package App\Models
 */
	class Caneve extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Crmopor
 *
 * @property int $codopo
 * @property int $codcam
 * @property string $nit
 * @property string $nombre
 * @property float $monto
 * @property string $origen
 * @property string $descripcion
 * @property string $tipo
 * @property Carbon $feccie
 * @property int $probabilidad
 * @property string $estado
 * @property int $codven
 * @package App\Models
 */
	class Crmopor extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Logplanoestaudi
 *
 * @property int $idplano
 * @property string $nombre_archivo
 * @property string $ubicacion_archivo
 * @property string $fecha_cierre
 * @property string $send_email
 * @property string $send_ftp
 * @property string $error_email
 * @property string $error_ftp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @package App\Models
 */
	class Logplanoestaudi extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detpla20130121
 *
 * @property int $codpla
 * @property int $codcar
 * @property float $valor
 * @property int $moneda
 * @package App\Models
 */
	class Detpla20130121 extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipseg
 *
 * @property string $tipseg
 * @property string $detalle
 * @package App\Models
 */
	class Tipseg extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Forpag
 *
 * @property int $forpag
 * @property string $detalle
 * @property int $moneda
 * @property string $cuecon
 * @property string $tipfor
 * @property string $gencom
 * @property string $nitcom
 * @property float $comtar
 * @property string $cuecom
 * @property string $cencom
 * @property float $retfue
 * @property string $cuerfue
 * @property float $retiva
 * @property string $cueriva
 * @property float $retica
 * @property string $cuerica
 * @property string $muecaj
 * @property string $mueres
 * @property string $predeterminado
 * @property string $estado
 * @package App\Models
 */
	class Forpag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estcac
 *
 * @property Carbon $fecha
 * @property int $motcan
 * @property int $unidad
 * @package App\Models
 */
	class Estcac extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Receph
 *
 * @property string $comprob
 * @property int $numero
 * @property Carbon $fecint
 * @property Carbon $fecha
 * @property string $cuenta
 * @property string $pide_nit
 * @property string $pide_base
 * @property string $pide_fact
 * @property string $pide_centro
 * @property string $nit
 * @property float $centro_costo
 * @property float $valor
 * @property string $deb_cre
 * @property string $descripcion
 * @property string $tipo_doc
 * @property float $numero_doc
 * @property float $base_grab
 * @property string $conciliado
 * @property Carbon $f_vence
 * @package App\Models
 */
	class Receph extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CrBookerReserva
 *
 * @property int $id Identificador
 * @property string|null $booker_id Identificador del booker
 * @property string|null $numres Número de reserva
 * @property string|null $amount Valor de la reserva
 * @property string|null $date Fecha de la reserva
 * @property string|null $booker_name Nombre del booker
 * @property-read \App\Models\CrBooker|null $booker
 * @property-read \App\Models\Reserva|null $reserva
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBookerReserva whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBookerReserva whereBookerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBookerReserva whereBookerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBookerReserva whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBookerReserva whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CrBookerReserva whereNumres($value)
 */
	class CrBookerReserva extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Novcom
 *
 * @property int $id
 * @property int $novrep_id
 * @property int $codusu
 * @property int $fecha
 * @property string $texto
 * @package App\Models
 */
	class Novcom extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tipate
 *
 * @property int $codigo
 * @property string $detalle
 * @package App\Models
 */
	class Tipate extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Precli
 *
 * @property string $cedula
 * @property string $numhab
 * @property int $claini
 * @property int $clafin
 * @property string $atencion
 * @package App\Models
 */
	class Precli extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SegWsUser
 *
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 * @property Collection|SegWsUsersGroup[] $seg_ws_users_groups
 * @package App\Models
 */
	class SegWsUser extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Garres
 *
 * @property int $numres
 * @property int $item
 * @property int $codusu
 * @property int $codcaj
 * @property Carbon $fecha
 * @property int $codcar
 * @property float $total
 * @property int $numrec
 * @property int $numegr
 * @property string $estado
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereCodcaj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereCodcar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereCodusu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereNumegr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereNumrec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereNumres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Garres whereTotal($value)
 */
	class Garres extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Valmon
 *
 * @property Carbon $fecha
 * @property int $moneda
 * @property float $valor
 * @package App\Models
 */
	class Valmon extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PtesaSoportesFactura
 *
 * @property int $id
 * @property int $creacion
 * @property string $cufe
 * @property boolean $request
 * @property string $mensajeRespuesta
 * @property string $filename
 * @property boolean $filecontent
 * @package App\Models
 */
	class PtesaSoportesFactura extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Estaclat
 *
 * @property Carbon $fecha
 * @property int $codcla
 * @property int $unidad
 * @property float $valor
 * @property float $aloja
 * @property int $numadu
 * @property int $numnin
 * @package App\Models
 */
	class Estaclat extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Detrec
 *
 * @property int $numrec
 * @property int $numero
 * @property int $forpag
 * @property int $numfor
 * @property Carbon $fecven
 * @property float $ivarep
 * @property float $valorm
 * @property float $valor
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereFecven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereForpag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereIvarep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereNumfor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereNumrec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereValor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Detrec whereValorm($value)
 */
	class Detrec extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Motvium
 *
 * @property int $codmot
 * @property string $detalle
 * @property string $predeterminado
 * @package App\Models
 */
	class Motvium extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cuenit
 *
 * @property string $cuenta
 * @property string $descripcion
 * @property string $nit
 * @package App\Models
 */
	class Cuenit extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Moneda
 *
 * @property int $moneda
 * @property string $nombre
 * @property string $simbolo
 * @property string $tipo
 * @property string $usecen
 * @package App\Models
 */
	class Moneda extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SmtpLogEmail
 *
 * @property int $id_log_email
 * @property string $tabla_origen
 * @property string $id_origen
 * @property string $email_orige
 * @property string $email_desti
 * @property int $id_plantilla
 * @property string $datos
 * @property string $enviado
 * @property string $error_envio
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @package App\Models
 */
	class SmtpLogEmail extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Empneg
 *
 * @property int $id
 * @property string $nit
 * @property int $codpla
 * @property string $observacion
 * @property string $servicios
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $polgar
 * @property string $polcan
 * @property string $codcor
 * @package App\Models
 */
	class Empneg extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cliente
 *
 * @property string $cedula
 * @property int $tipdoc
 * @property string $lugexp
 * @property string $categoria
 * @property string $accion
 * @property string $nombre
 * @property string $sexo
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 * @property string $direccion
 * @property int $locdir
 * @property int $codpai
 * @property int $codciu
 * @property Carbon $fecnac
 * @property int $locnac
 * @property int $codnac
 * @property int $codpro
 * @property Carbon $ultest
 * @property int $numest
 * @property Carbon $feccre
 * @property int $tipcli
 * @property string $credito
 * @property string $tipcre
 * @property float $cupo
 * @property int $diaven
 * @property string $exento
 * @property string $cuepla
 * @property string $clides
 * @property string $actint
 * @property string $tipinf
 * @property string $observacion
 * @property string $soundphone
 * @property string $estado
 * @property string $estsis
 * @property int $ciudades_dian
 * @property string $cat_caja
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $tipo_regimen_dian
 * @property string $emailfe
 * @package App\Models
 * @property string|null $bookingemail Correo electrónico de la reserva en línea
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereAccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereActint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereBookingemail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCedula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCiudadesDian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereClides($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCodciu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCodnac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCodpai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCodpro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCredito($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCuepla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereCupo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereDiaven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereEmailfe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereEstsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereExento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereFeccre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereFecnac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereLocdir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereLocnac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereLugexp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereNumest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente wherePrimerApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente wherePrimerNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereSegundoApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereSegundoNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereSexo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereSoundphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTelefono1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTelefono2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTipcli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTipcre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTipdoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTipinf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereTipoRegimenDian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cliente whereUltest($value)
 */
	class Cliente extends \Eloquent {}
}

namespace App{
/**
 * App\Reservation
 *
 * @property int $id
 * @property int|null $reservation_id Id de la reserva del booking engine
 * @property int|null $pms_reservation_id Id de la reserva de PMS
 * @property string|null $booking_engine Nombre del booking engine
 * @property string|null $customer_name Nombre del cliente
 * @property string|null $customer_phone Telefono del cliente
 * @property string|null $customer_email Correo electrónico del cliente
 * @property string|null $customer_country Código del pais del cliente
 * @property string|null $checkin Fecha de llegada
 * @property string|null $checkout Fecha de salida
 * @property float|null $price Precio total de la reserva
 * @property string|null $currency Código de la moneda
 * @property string|null $metadata Meta data completa de la reserva del booking engine
 * @property string|null $status Estado de la reserva
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereBookingEngine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCheckin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCheckout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCustomerCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation wherePmsReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereUpdatedAt($value)
 */
	class Reservation extends \Eloquent {}
}

namespace App{
/**
 * App\RategainRequest
 *
 * @property int $id
 * @property string|null $reference
 * @property string|null $type
 * @property string|null $request
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $xml
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RategainRequest whereXml($value)
 */
	class RategainRequest extends \Eloquent {}
}

