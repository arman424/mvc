<?php

namespace App\Services;

class EmailSender {
    public function sendEmail($data): void
    {
        echo "<div>Sending email with data: $data</div>";
    }
}
