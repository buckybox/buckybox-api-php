# Bucky Box Core API v1.0 PHP

###About This Wrapper

The Bucky Box PHP API wrapper is meant to help make working with the Bucky Box API easier for PHP developers. It doesn't do anything that working directly with the API can't do, it just provides an abstraction layer making it quicker to use.

In order to use this API you must be a distributor of [Bucky Box](https://www.buckybox.com), and have acquired a key and a secret. Please contact support@buckybox.com for further information.

### Installation

Composer: `"buckybox/bucky-box-api-php": "dev-master"`

### Basics

    $wrapper = new BuckyBoxApiWrapper($api_key, $api_secret); 
    var_dump($wrapper->customers()->all());

### Full API Documentation

Available here: https://api.buckybox.com/docs/v1

OK we lied, not all of the API has been documented, contact support@buckybox.com if you need more details.
