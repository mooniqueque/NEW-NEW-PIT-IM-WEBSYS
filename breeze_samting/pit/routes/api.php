<?php

use App\Models\AdmissionInfo;

Route::get('/enrollment-status', function () {
    // Your logic here
})->name('enrollment-status');


Route::get('/students', function () {
    return AdmissionInfo::all(['firstName', 'lastName']);
});
