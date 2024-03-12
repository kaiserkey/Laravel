<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'edad', 'email'];

    // Aquí se especifican los campos que son "fillable" (es decir, que se pueden asignar masivamente)

    // Si tienes campos que deseas ocultar de las respuestas JSON, puedes usar la propiedad $hidden
    // protected $hidden = ['password'];

    // Si tienes campos que deseas mostrar siempre como parte de la respuesta JSON, puedes usar la propiedad $visible
    // protected $visible = ['nombre', 'email'];

    // También puedes definir relaciones con otros modelos aquí, por ejemplo:
    /*
    public function direccion()
    {
        return $this->hasOne(Direccion::class);
    }
    */
}
