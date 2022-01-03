<?php

require_once "setting.php";

foreach ($data['data'] as $row) {

    if (is_array($row)) {

        foreach ($row as $rows) {
            if ($rows['last_price'] > $rows['low']) {
                sendNotif("Aset Aman");
            } else if ($rows['last_price'] < $rows['low']) {
                sendNotif("Aset Turun");
            } else if ($rows['last_price'] > $high['high']) {
                sendNotif("Aset Naik");
            }
        }
    }
}

function sendNotif($pesan)
{
    $token = "2106194542:AAFWke1NaUL5nWzsEZJ-22pcsXwd80KbMCQ";
    $chat_id = "-669098885"; //Grup id: -669098885, Chat idku: 1185062064

    $pesan = json_encode($pesan);
    $API = "https://api.telegram.org/bot" . $token . "/sendmessage?chat_id=" . $chat_id . "&text=$pesan";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
