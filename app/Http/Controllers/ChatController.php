<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // Отримання всіх повідомлень.
    public function fetchMessages()
    {
        return Message::all(); // Повертаємо всі повідомлення у форматі JSON.
    }

    // Збереження нового повідомлення.
    public function sendMessage(Request $request)
    {
        // Створюємо нове повідомлення та зберігаємо в базі.
        $message = Message::create([
            'user' => $request->user,       // Ім'я користувача, яке ми отримаємо з форми.
            'message' => $request->message // Текст повідомлення.
        ]);

        return $message; // Повертаємо збережене повідомлення.
    }
}

