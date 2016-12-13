<?php

include 'init.php';

$client = new \ProcessOut\ProcessOut('proj_gAO1Uu0ysZJvDuUpOGPkUBeE3pGalk3x', 
    'key_fBjPvkgT8gyKc1SUpy0PfjL7UgsRmUug');

// Create and fetch a new invoice
$invoice = $client->newInvoice(array(
    'name' => 'Test invoice',
    'amount' => '9.99',
    'currency' => 'USD'
))->create();

assert(!empty($invoice->getId()), 'The invoice ID should not be empty');

$fetched = $client->newInvoice()->find($invoice->getId());
assert(!empty($fetched->getId()), 'The fetched invoice ID should not be empty');
assert($invoice->getId() == $fetched->getId(), 'The invoices ID should be equal');

// Fetch the customers
$customers = $client->newCustomer()->all();

// Create a subscription for a customer
$customer = $client->newCustomer()->create();
assert(!empty($customer->getId()), 'The created customer ID should not be empty');

$subscription = $client->newSubscription(array(
    'amount' => '9.99',
    'currency' => 'USD',
    'interval' => '1d',
    'name' => 'great subscription'
))->create($customer->getId());
assert(!empty($subscription->getId()), 'The created subscription ID should not be empty');

// Expand a customers' project and fetch gateways
$customer = $client->newCustomer()->create(array("expand" => array("project")));
assert(!empty($customer->getProject()), 'The customer project should be expanded');

$confs = $customer->getProject()->fetchGatewayConfigurations();

// Make sure the error code is correctly fetched
try {
    $client->newCustomer()->find('bad');
    assert(false, 'There should have been an error');
} catch(\ProcessOut\Exceptions\NotFoundException $e) {
    assert($e->getCode() == 'resource.customer.not-found', 'The error code was incorrect');
}