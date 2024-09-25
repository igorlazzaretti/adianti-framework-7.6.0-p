<?php
require_once 'init.php';

try
{
    TTransaction::open('curso');
    $customer = new Customer(1);
    print_r($customer->toArray());
    TTransaction::close();
}
catch (Exception $e)
{
    print $e->getMessage();
}
?>