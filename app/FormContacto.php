<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $pais
*/
class FormContacto extends Model
{
    protected $table = 'forms_contacto';

    protected $fillable = ['content'];
    
}
