<?php
include "whatsApp.php";
$whats = new WhatsApp("Isso é um teste feito no PHP 😎", 5531989715963, "Isso é um teste: ");
$whats->send();