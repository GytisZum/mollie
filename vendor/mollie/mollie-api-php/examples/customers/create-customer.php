<?php

namespace _PhpScoper5ea00cc67502b;

/*
 * How to create a new customer in the Mollie API.
 */

use _PhpScoper5ea00cc67502b\Mollie\Api\Exceptions\ApiException;
use function htmlspecialchars;

try {
    /*
     * Initialize the Mollie API library with your API key or OAuth access token.
     */
    require "../initialize.php";
    /**
     * Customer creation parameters.
     *
     * @See https://docs.mollie.com/reference/v2/customers-api/create-customer
     */
    $customer = $mollie->customers->create(["name" => "Luke Skywalker", "email" => "luke@example.org", "metadata" => ["isJedi" => TRUE]]);
    echo "<p>New customer created " . htmlspecialchars($customer->id) . " (" . htmlspecialchars($customer->name) . ").</p>";
} catch (ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}