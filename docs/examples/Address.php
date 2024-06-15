<?php

require '../../vendor/autoload.php';

use CommerceGuys\Addressing\Repository\AddressFormatRepository;
use CommerceGuys\Addressing\Repository\SubdivisionRepository;
use Deliwrapp\Component\ValueObjects\Address\Address;

echo '<h1>Example usage of PHPValueObjects Address.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'countryCode' => 'FR',
    'AdministrativeArea' => 'FR',
    'Locality' => 'Lyon',
    'dependentLocality' => '',
    'PostalCode' => '69002',
    'Street' => '132 Rue Bossuet',
    'ExtraLine' => 'Hello World'
];

$address = new Address($values);
dump($address);

/**
 * As the Value Object doesn't extend Commerceguys/Address library anymore, these features are not longer avaialable.
 *
 * To get them, use commerceguys/addressing and commerceguys/intl.
 */

/*
echo '<h1>Format the address: US</h1>';

echo '<h2>Default options</h2>';
echo $address->toString();

echo '<h2>Without HTML</h2>';
echo $address->toString(['html' => false]);

echo '<h2>In another locale: DE</h2>';
echo $address->toString(['locale' => 'DE']);

echo '<h2>Using the "pre" tag</h2>';
echo $address->toString(['html_tag' => 'pre']);

echo '<h1>Example usage of PHPValueObjects Address with chineese addresses.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'countryCode' => 'FR',
    'AdministrativeArea' => 'France',
    'Locality' => 'Lyon',
    'dependentLocality' => 'Rhone-Alpes',
    'PostalCode' => '69002',
    'SortingCode' => '',
    'AddressLine1' => '132 Rue Bossuet',
    'AddressLine2' => ' ',
    'Organization' => 'Deliwrapp',
    // Recipient's name and surname
    'Recipient' => 'Delwirapp & Co',
    'locale' => 'fr'
];

$address = new Address($values);
dump($address);

echo '<h2>In another locale: IT</h2>';
echo $address->toString(['locale' => 'IT']);

echo '<h1>Some other useful features of the CommerceGuys/Addressing library</h1>';
$addressFormatRepository = new AddressFormatRepository();
$subdivisionRepository = new SubdivisionRepository();

// Get the address format for Brazil.
$addressFormat = $addressFormatRepository->get('IT');

// Get the subdivisions for Brazil.
$states = $subdivisionRepository->getAll('IT');
foreach ($states as $state) {
    $municipalities = $state->getChildren();
}

// Get the subdivisions for Canada, in French.
$states = $subdivisionRepository->getAll('IT', 0, 'fr');
foreach ($states as $state) {
    echo $state->getName();
}
*/
