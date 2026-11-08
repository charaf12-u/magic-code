<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('magic:info', function () {
    $this->info('Magic Code — Web, Mobile, Data & AI.');
})->purpose('Display Magic Code information');
