<?php
namespace Lingmyat\MssJsValidation\Facades;

use Illuminate\Support\Facades\Facade;


class MssValidation extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mssValidation';
    }
}
