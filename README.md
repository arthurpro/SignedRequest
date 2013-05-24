# Graze\SignedRequest #


**Version:** *0.1.0*<br/>


Simple library for signing requests to our web services.


### Usage ###

Requests made to our web services require your parameters to be signed.
With this library, we provide you with an easy way to generate the signature.

```php
<?php

$secret = 'banana';
$params = array('id' => 123);
$signed = Graze\SignedRequest\sign($secret, $params);

$params['signature'] = $signed;

// Send request with $params
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
The Vagrant setup comes with multiple PHP environments to be able to work and test on relevant versions,
so you must specify which version you want to setup and SSH into.
The repository will be mounted in `/srv`.
```bash
$ vagrant up  [v53|v54]
$ vagrant ssh [v53|v54]

Welcome to Ubuntu 12.04 LTS (GNU/Linux 3.2.0-23-generic x86_64)
$ cd /srv
```


### License ###
The content of this library is released under the **MIT License** by **Nature Delivered Ltd**.<br/>
You can find a copy of this license at http://www.opensource.org/licenses/mit


<!-- Links -->
[vagrant]: http://vagrantup.com
