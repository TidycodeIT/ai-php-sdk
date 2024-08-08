# SDK Tidycode AIClient for PHP.

This SDK allows you to integrate your PHP eCommerce with our dedicated artificial intelligence services. Currently, the SDK supports the **Fraud Detection** service, but is designed to be extended with other services in the future.

## Installation.

To use this SDK, you must add it to your PHP project. It can be installed via [Composer](https://getcomposer.org/).

Add the dependency to the `composer.json` of your composer module or package:

```json
{
  "require": {
    "tidycode/ai-php-sdk":"^1.0"
  }
}
```
or install it via the composer command
```bash
composer require tidycode/ai-php-sdk
```

Then run the command:

```bash
composer install
```

## Using Fraud Detection

### Configuration.

To start using the Fraud Detection service, create an instance of the `Tidycode\AIClient\FraudDetection` class.

```php
require 'vendor/autoload.php';

use Tidycode\AIClient\FraudDetection;

$client = new FraudDetection('your-api-key');
```

### Methods

The SDK offers the following methods:

#### 1. `detectFraud`.

Checks whether an order is suspected of fraud.

**Parameters**: a JSON array with the order data.

**JSON format**:

```json
{
    "email": "test@testmail.com",
    "firstname": "Firstname",
    "lastname": "Lastname",
    "ips": "192.168.0.1, 192.168.0.2",
    "billing_address": {
        "address_type": "billing",
        "city": "Trieste",
        "country_id": "IT",
        "email": "test@testmail.com",
        "firstname": "Firstname",
        "lastname": "Lastname",
        "postcode": "10000",
        "region_id": "TS",
        "street": "Test",
        "telephone": "0123456789"
    },
    "shipping_address": {
        "address_type": "shipping",
        "city": "Trieste",
        "country_id": "IT",
        "email": "test@testmail.com",
        "firstname": "Firstname",
        "lastname": "Lastname",
        "postcode": "10000",
        "region_id": "TS",
        "street": "Test",
        "telephone": "0123456789"
    },
    "currency": "USD",
    "payment_method": "[payment code]",
    "total_paid": "105.00",
    "shipping_cost": "5.00",
    "item_count": "1",
    "shipping_method": "[shipment code]",
    "date": "2024-07-23 10:08:56"
}
```

**Example usage**:

```php
$orderData = [
    // the order data in JSON format.
];

$response = $client->detectFraud($orderData);
print_r($response);
```

#### 2. `reportFalsePositive`.

Reports an incorrectly classified order as fraud.

**Parameters**: a JSON array with the order data. The JSON is the same as the `detectFraud` method.

**Example usage**:

```php
$response = $client->reportFalsePositive($orderData);
print_r($response);
```

#### 3. `reportFalseNegative`.

Reports an order incorrectly classified as non-fraudulent. The JSON is the same as in the `detectFraud` method.

**Parameters**: a JSON array with the order data.

**Example usage**:

```php
$response = $client->reportFalseNegative($orderData);
print_r($response);
```

#### 4. `paymentList`.

Returns the list of payment method codes.

**Example usage**:

```php
$paymentCodes = $client->paymentList();
print_r($paymentCodes);
```

#### 5. `shipmentList`.

Returns the list of shipment method codes.

**Example usage**:

```php
$shipmentCodes = $client->shipmentList();
print_r($shipmentCodes);
```

## Adding New Services.

The SDK is designed to be extended with additional services in the future. Any new services will be documented and added to the list of available methods in this README.

## License.

This project is licensed under the [MIT License](LICENSE).

---

# SDK Tidycode AIClient per PHP

Questo SDK consente di integrare i vostri eCommerce PHP con i nostri servizi di intelligenza artificiale dedicati. Attualmente, il SDK supporta il servizio di **Rilevamento Frodi**, ma è progettato per essere esteso con altri servizi in futuro.

## Installazione

Per utilizzare questo SDK, è necessario aggiungerlo al vostro progetto PHP. Può essere installato tramite [Composer](https://getcomposer.org/).

Aggiungi la dipendenza al `composer.json` del tuo modulo o pacchetto composer:

```json
{
  "require": {
    "tidycode/ai-php-sdk": "^1.0"
  }
}
```
oppure installalo tramite il comando composer
```bash
composer require tidycode/ai-php-sdk
```

Esegui quindi il comando:

```bash
composer install
```

## Utilizzo Fraud Detection

### Configurazione

Per iniziare a utilizzare il servizio di Fraud Detection, crea un'istanza della classe `Tidycode\AIClient\FraudDetection`.

```php
require 'vendor/autoload.php';

use Tidycode\AIClient\FraudDetection;

$client = new FraudDetection('your-api-key');
```

### Metodi

L'SDK offre i seguenti metodi:

#### 1. `detectFraud`

Verifica se un ordine è sospetto di frode.

**Parametri**: un array JSON con i dati dell'ordine.

**Formato JSON**:

```json
{
  "email": "test@testmail.com",
  "firstname": "Firstname",
  "lastname": "Lastname",
  "ips": "192.168.0.1, 192.168.0.2",
  "billing_address": {
    "address_type": "billing",
    "city": "Trieste",
    "country_id": "IT",
    "email": "test@testmail.com",
    "firstname": "Firstname",
    "lastname": "Lastname",
    "postcode": "10000",
    "region_id": "TS",
    "street": "Test",
    "telephone": "0123456789"
  },
  "shipping_address": {
    "address_type": "shipping",
    "city": "Trieste",
    "country_id": "IT",
    "email": "test@testmail.com",
    "firstname": "Firstname",
    "lastname": "Lastname",
    "postcode": "10000",
    "region_id": "TS",
    "street": "Test",
    "telephone": "0123456789"
  },
  "currency": "USD",
  "payment_method": "[payment code]",
  "total_paid": "105.00",
  "shipping_cost": "5.00",
  "item_count": "1",
  "date": "2024-07-23 10:08:56"
}
```

**Esempio di utilizzo**:

```php
$orderData = [
    // i dati dell'ordine in formato JSON
];

$response = $client->detectFraud($orderData);
print_r($response);
```

#### 2. `reportFalsePositive`

Segnala un ordine erroneamente classificato come frode.

**Parametri**: un array JSON con i dati dell'ordine. Il JSON è il medesimo del metodo `detectFraud`

**Esempio di utilizzo**:

```php
$response = $client->reportFalsePositive($orderData);
print_r($response);
```

#### 3. `reportFalseNegative`

Segnala un ordine erroneamente classificato come non fraudolento. Il JSON è il medesimo del metodo `detectFraud`

**Parametri**: un array JSON con i dati dell'ordine.

**Esempio di utilizzo**:

```php
$response = $client->reportFalseNegative($orderData);
print_r($response);
```

#### 4. `paymentList`

Restituisce la lista dei codici dei metodi di pagamento.

**Esempio di utilizzo**:

```php
$paymentCodes = $client->paymentList();
print_r($paymentCodes);
```

#### 5. `shipmentList`

Restituisce la lista dei codici dei metodi di spedizione.

**Esempio di utilizzo**:

```php
$shipmentCodes = $client->shipmentList();
print_r($shipmentCodes);
```

## Aggiunta Nuovi Servizi

Il SDK è progettato per essere esteso con ulteriori servizi in futuro. Ogni nuovo servizio sarà documentato e aggiunto alla lista dei metodi disponibili in questo README.

## Licenza

Questo progetto è concesso in licenza sotto la [Licenza MIT](LICENSE).
