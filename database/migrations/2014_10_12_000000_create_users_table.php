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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_type')->nullable(); // Ajout du champ pour stocker le type de fichier du logo
            $table->string('nom_compagnie_aerienne')->nullable();
            $table->string('code_airport')->nullable();
            $table->string('code_LATA')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->string('fonction')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role');
            $table->string('phone')->nullable();
            $table->string('num_passeport')->nullable();
            $table->string('password')->nullable();
            $table->string('confirm_password')->nullable();
            $table->string('status')->default('pending');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->dropColumn('logo_type'); // Supprimer le champ du type de fichier du logo lors de la migration inverse
        });
    }
};
