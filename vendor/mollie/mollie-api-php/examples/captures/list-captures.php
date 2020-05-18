<?php

namespace _PhpScoper5ea00cc67502b;

/*
 * List captures for a payment using the Mollie API.
 */

use _PhpScoper5ea00cc67502b\Mollie\Api\Exceptions\ApiException;
use function htmlspecialchars;

try {
    /*
     * Initialize the Mollie API library with your API key or OAuth access token.
     */
    require "../initialize.php";
    /*
     * List captures for payment with ID 'tr_WDqYK6vllg'.
     *
     * See: https://docs.mollie.com/reference/v2/captures-api/list-captures
     */
    $payment = $mollie->payments->get('tr_WDqYK6vllg');
    $captures = $payment->captures();
    foreach ($captures as $capture) {
        $amount = $capture->amount->currency . ' ' . $capture->amount->value;
        echo 'Captured ' . $amount . ' for payment ' . $payment->id;
    }
} catch (ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}