<?php

use Illuminate\Support\Facades\Route;
use Lingmyat\MssJsValidation\Services\MssJsValidationContainer;

Route::prefix('mss-validation')->group(function() {
    Route::post('/validate',[MssJsValidationContainer::class, 'validate'])->name('mss-validation.validate');
});
