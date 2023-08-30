<?php

namespace Lingmyat\MssJsValidation\Contracts;

use Illuminate\Http\Request;

interface MssJsValidationFrame
{
    public function validate(Request $request) :void;

    public function script(array $array) :string;
}
