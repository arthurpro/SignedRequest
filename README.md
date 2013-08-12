# SignedRequest #


**Version:** *0.2.0*<br/>
**Master build:** [![Master branch build status][travis-master]][travis]


Simple library for signing HTTP requests to your internal services.
This library *should not* be used to sign requests to publicly accessible resources.
For public APIs, we recommend [Hawk][hawk] or similar.

It can be installed in whichever
way you prefer, but we recommend [Composer][packagist].
```json
{
    "require": {
        "graze/signed-request": "~0.2.0"
    }
}
```


### Usage ###

Requests made to our web services require your parameters to be signed.
With this library, we provide you with an easy way to generate the signature.

```php
<?php

$secret = 'banana';
$params = array('id' => 123);
$signed = Graze\SignedRequest\sign($secret, $params);

// Send request with $signed
```

Validation is also included, but as a client you won't need to use it.

```php
<?php

// Receive request from client
// Assume $params is an array of all GET request parameters

$secret = 'banana';
if (Graze\SignedRequest\validate($secret, $params)) {
    // Request is valid
}

```


### Contributing ###
We accept contributions to the source via Pull Request,
but passing unit tests must be included before it will be considered for merge.
```bash
$ make install
$ make tests
```

If you have [Vagrant][vagrant] installed, you can build our dev environment to assist development.
The repository will be mounted in `/srv`.
```bash
$ vagrant up
$ vagrant ssh

Welcome to Ubuntu 12.04 LTS (GNU/Linux 3.2.0-23-generic x86_64)
$ cd /srv
```


### License ###
The content of this library is released under the **MIT License** by **Nature Delivered Ltd**.<br/>
You can find a copy of this license at http://www.opensource.org/licenses/mit


<!-- Links -->
[travis]: https://travis-ci.org/graze/SignedRequest
[travis-master]: https://travis-ci.org/graze/SignedRequest.png?branch=master
[packagist]: https://packagist.org/packages/graze/signed-request
[vagrant]: http://vagrantup.com
[hawk]: https://github.com/hueniverse/hawk
