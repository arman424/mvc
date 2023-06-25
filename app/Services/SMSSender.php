<?php

namespace App\Services;

class SMSSender {
    public function sendSMS($data): void
    {
        echo "<div>Sending SMS with data: $data</div>";
    }
}
