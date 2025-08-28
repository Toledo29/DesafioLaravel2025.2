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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->timestamp('data_nascimento');
            $table->string('cpf')->unique();
            $table->decimal('saldo', 10, 2)->nullable()->default(0);
            $table->string('foto')->nullable();
            $table->string('cep');
            $table->integer('numero');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('complemento')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('senha');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('usuario_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->string('role')->default('usuario');
        });

        Schema::create('admin', function (Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->timestamp('data_nascimento');
            $table->string('cpf')->unique();
            $table->string('foto')->nullable();
            $table->string('cep');
            $table->integer('numero');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('complemento')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('senha');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('produto',function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nome');
            $table->decimal('preco', 10, 2);
            $table->text('descricao');
            $table->integer('quantidade');
            $table->string('categoria');
            $table->foreignId('usuario_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('produto');
    }
};
