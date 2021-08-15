<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearUsuarioBot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
        //Solo crear usuario bot
        $usuario = new User();
        $usuario->name = "Pedrito BOT - El Bot de EPICI";
        $usuario->email = "bot@support.unprg.edu.pe";
        $usuario->avatar = "https://static.botsrv2.com/website/img/quriobot_favicon.1727b193.png";
        $usuario->link_img = "https://static.botsrv2.com/website/img/quriobot_favicon.1727b193.png";
        $usuario->google_id = env('BOT_UNPRG_SECRET_ID'); //Para eliminar //Por defecto este debería ser el primero
        $usuario->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
        $usuario = User::where('google_id','=',env('BOT_UNPRG_SECRET_ID'));
        if(!is_null($usuario)){
            $usuario->delete();
        }
        
    }
}
