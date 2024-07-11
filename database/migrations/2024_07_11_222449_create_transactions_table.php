use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('administrador')) {
            Schema::create('administrador', function (Blueprint $table) {
                $table->id('id_administrador');
                $table->string('usuario_admin', 45)->nullable();
                $table->string('correo_admin', 45)->nullable();
                $table->string('contrasena_admin', 45)->nullable();
                $table->primary('id_administrador');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('administrador');
    }
}
