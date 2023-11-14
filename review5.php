<?php

class NotificationService {
    public function sendNotification($message) {
        $emailNotifier = new EmailNotifier();
        $emailNotifier->send($message);
    }
}

class EmailNotifier {
    public function send($message) {
        // Логика отправки уведомления по электронной почте
        echo "Отправлено письмо: $message\n";
    }
}

// Пример использования
$notificationService = new NotificationService();
$notificationService->sendNotification("Привет, это уведомление!");
