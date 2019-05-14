<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('♥', function() {
    $this->comment("- Gustavo Satheler");
    $this->comment("- Judson Henrique");
    $this->comment("- Michael Martins");
    $this->comment("- Rodrigo Oliveira");
    $this->comment("- Sabrina Winckler");
    $this->comment("ESSAS PESSOAS SÃO FODAS!!");
})->describe('Display the name of the developers involved');
