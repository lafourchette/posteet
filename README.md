Posteet
=======

Posteet is a very simple platform to post quotes & images.

1) Why does this project exist?
-------------------------------

This project was created to train newcomers at LaFourchette to the Symfony2 Framework

2) Installation
---------------

Start to clone this repository.

### a) Configure your application

Copy the ``app/config/parameters.yml-dist`` file to
``app/config/parameters.yml`` and edit this file to have a correct
configuration.

### b) Install the Vendor Libraries

You need to download all of the necessary vendor libraries.
This application use composer so, download it following the
instructions on http://getcomposer.org/ and then run the following:

    php composer.phar install

### b) Check your System Configuration

Thanks to Assetic, we can use the less version of the bootstrap. So you must
install less with npm.

For Unix like system, if you don't have node install yet, dowload source from
http://nodejs.org/#download and install it with the following command:

    ./configure
    make
    sudo make install

To install less, run the following command:

    sudo npm install -g less

Enjoy!
