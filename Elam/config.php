<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51OsJN9BoqNqzi0tnR8T8PsHM8aljhrOgfpfuDkfGP048TLWUs9tIp5YbL2ZBft1sQ6nJ5F37tZvwwDX8Vafi9qQS00Nmop8kat";

$secretKey="sk_test_51OsJN9BoqNqzi0tnyy6mkfGC5iddVJRfkNelIsgY9JXQlOwo0LEQI4FAdRbfZ1n8rcYxfLoSKYY3hcYS1Tuho4bN00inGJE0p7";

\Stripe\Stripe::setApiKey($secretKey);
?>