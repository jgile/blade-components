@props(['brand' => null])
<?php
$brands = [
    'visa' => 'fab fa-cc-visa',
    'amex' => 'fab fa-cc-amex',
    'stripe' => 'fab fa-cc-stripe',
    'paypal' => 'fab fa-cc-paypal',
    'mastercard' => 'fab fa-cc-mastercard',
    'discover' => 'fab fa-cc-discover',
    'apple-pay' => 'fab fa-cc-apple-pay',
    'jcb' => 'fab fa-cc-jcb',
];
?>
<i dusk="cc-icon" {{ $attributes->merge(['class' => $brands[$brand] ?? 'far fa-credit-card']) }}></i>
