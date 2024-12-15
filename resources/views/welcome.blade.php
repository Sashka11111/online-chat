<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Онлайн Чат</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            background-color: #6200ea;
            color: #fff;
            padding: 1rem;
            width: 100%;
            text-align: center;
            margin: 0;
        }

        #messages {
            border: 1px solid #ddd;
            background: #fff;
            padding: 1rem;
            width: 90%;
            max-width: 600px;
            height: 300px;
            overflow-y: auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 1rem 0;
        }

        #chat-form {
            display: flex;
            flex-direction: column;
            width: 90%;
            max-width: 600px;
        }

        #chat-form input[type="text"] {
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        #chat-form button {
            padding: 0.5rem;
            background-color: #6200ea;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #chat-form button:hover {
            background-color: #4500b5;
        }

        p {
            margin: 0.5rem 0;
        }

        p strong {
            color: #6200ea;
        }

        /* Адаптивність */
        @media (max-width: 768px) {
            #messages, #chat-form {
                width: 100%;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<h1>Онлайн Чат</h1>
<div id="messages"></div>
<form id="chat-form">
    <input type="text" id="user" placeholder="Ваше ім'я" required>
    <input type="text" id="message" placeholder="Повідомлення" required>
    <button type="submit">Надіслати</button>
</form>

<script>
    // Завантаження повідомлень.
    function fetchMessages() {
        axios.get('/messages')
        .then(response => {
            const messages = response.data;
            const messagesDiv = document.getElementById('messages');
            messagesDiv.innerHTML = ''; // Очищуємо поле
            messages.forEach(msg => {
                messagesDiv.innerHTML += `<p><strong>${msg.user}:</strong> ${msg.message}</p>`;
            });
        });
    }

    // Надсилання повідомлення.
    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Зупиняємо перезавантаження сторінки.

        const user = document.getElementById('user').value;
        const message = document.getElementById('message').value;

        axios.post('/messages', { user, message })
        .then(() => {
            fetchMessages(); // Оновлюємо список повідомлень.
            document.getElementById('message').value = ''; // Очищуємо поле.
        });
    });

    // Завантажуємо повідомлення при старті.
    fetchMessages();
    setInterval(fetchMessages, 5000); // Оновлюємо кожні 5 секунд.
</script>
</body>
</html>
