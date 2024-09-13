<div align="center">
  <img alt="ElephantinoLogo" src=".github/pictures/logo.png" width="200px"/>
        <h1>Elephantino</h1>
        <img src="https://img.shields.io/github/contributors/KamSaf/elephantino"/></a>
      <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/KamSaf/elephantino"/>
</div>


## Description

Elephantino is a micro PHP web application framework created purely for fun and educational purposes.


## Technologies and tools used:

- PHP 8.1


## How to use

To create application using it first you need to install it in your project:

1. If you haven't created project yet run and go through its configuration:

        composer init

2. Include ```Elephantino``` in your project by running:

        composer require kamsaf/elephantino:dev-main
        

By now you are ready to use it. To start project run script:

        php vendor/kamsaf/elephantino/scripts/setup.php

or set up project manually by creating a new PHP file in your project directory and pasting this code:


        <?php

        use Elephantino\Core\App;
        use Elephantino\Http\Response;

        require_once __DIR__ . '/vendor/autoload.php';

        $app = new App();

        $app->get(
            "/",
            fn() => Response::json(['message' => 'Hello'])
        );

        $app->run(debug: true);


Now run server inside root directory of your project and access the file address in the browser.

##

Created by Kamil Safaryjski 2024
