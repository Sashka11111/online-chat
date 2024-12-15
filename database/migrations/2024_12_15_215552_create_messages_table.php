<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();                  // Унікальний ідентифікатор повідомлення.
            $table->string('user');        // Ім'я користувача.
            $table->text('message');       // Текст повідомлення.
            $table->timestamps();          // Час створення/оновлення повідомлення.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
