<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      /*   Schema::create('altura', function (Blueprint $table) {
            $table->id('id_altura');
            $table->string('descripcion');            
        }); */

        /* Schema::create('concentrado', function (Blueprint $table) {
            $table->id();
            $table->string('Sm_Av');
            $table->string('Latitud');
            $table->string('Longitud');
            $table->string('Posicion');
            $table->string('Circuito');
            $table->string('Etiqueta');
            $table->string('RPU');
            $table->string('Municipalizado');
            $table->string('Luminarias');
            $table->string('Id_medida_fk');
            $table->string('Id_lampara_fk');
            $table->string('Id_potencia_fk');
            $table->string('Id_poste_fk');
            $table->string('Id_dependencia_fk');
            $table->string('Id_altura_fk');
            $table->string('Id_estatus_fk');
            $table->string('Id_transformador_fk');
            $table->string('id_tipoLuminaria_fk');
            $table->string('updated_at');
            $table->string('created_at');
            $table->string('NumMedidor');
            $table->string('Observaciones');
            $table->string('EsCerrado');
            //$table->timestamps();
        }); */

      /*   Schema::create('dependencia', function (Blueprint $table) {
            $table->id('id_dependencia');
            $table->string('descripcion');
        });
 */
      /*   Schema::create('estatus', function (Blueprint $table) {
            $table->id('id_estatus');
            $table->string('descripcion');            
        }) */;

       /*  Schema::create('lamparas', function (Blueprint $table) {
            $table->id('id_lampara');
            $table->string('tipo');
            $table->string('descripcion');
            $table->integer('EsTecnologia');
        }); */

       /*  Schema::create('medidas', function (Blueprint $table) {
            $table->id('id_medida');
            $table->string('tipo');
            $table->string('descripcion');            
        }); */

        Schema::create('potencia', function (Blueprint $table) {
            $table->id('id_potencia');
            $table->string('descripcion');            
        });

        Schema::create('tipoluminaria', function (Blueprint $table) {
            $table->id('id_luminaria');
            $table->string('descripcion');            
        });

        Schema::create('tipoposte', function (Blueprint $table) {
            $table->id('id_poste');
            $table->string('descripcion');           
        });
        
        Schema::create('transformador', function (Blueprint $table) {
            $table->id('id_transformador');
            $table->string('Voltaje');            
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('email_verified_at');
            $table->string('password');
            $table->string('remember_token');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::drop('altura');
        // Schema::drop('concentrado');
        // Schema::drop('dependencia');
        /* Schema::drop('estatus');
        Schema::drop('lamparas'); */
        // Schema::drop('medidas');
        Schema::drop('potencia');
        Schema::drop('tipoluminaria');
        Schema::drop('tipoposte');
        Schema::drop('transformador');
        Schema::drop('users'); 
        /* Schema::dropIfExists('users');  */       
    }
};
