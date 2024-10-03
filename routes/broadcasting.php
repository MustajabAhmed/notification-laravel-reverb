<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('system-maintenance', function () {
    return true;
});