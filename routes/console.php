<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('bitcoin:cache-height')->everyMinute();
