## MSS Javascript Validation

**MSS Javascript Validation** package allows to reuse your Laravel [Validation Rules][], [Messages][], [FormRequest][] to validate forms automatically in client side without need to write any Javascript code or use HTML Builder Class. 

You can validate forms automatically referencing it to your defined validations. The messages are loaded from your  validations and translated according your Localization preferences.

#### Supported versions

Laravel 9.x - 10.x

#### Feature overview

- Automatic creation of Javascript validation based on your [Validation Rules][] or [FormRequest][], no Javascript coding required.
-Not Supports other validation packages yet. 
- AJAX validation for [ActiveURL][], [Unique][] and [Exists][] Rules, [Custom Validation Rules][] and other validation packages
- Unobtrusive integration, you can use without Laravel Form Builder
- The package uses [Jquery Validation Plugin][]  bundled in provided script..

##### Installation

```html

composer require lingmyat/mss-js-validation

```

After Installation you need to init package in  **config/app.php**

```html

Lingmyat\MssJsValidation\MssJsValidationServiceProvider::class,

```

Then you need to add aliases

```html

"MssValidation" => Lingmyat\MssJsValidation\Facades\MssValidation::class,

```

After that steps you still need to publish vendor files

```html
php artisan vendor:publish --tag=mss-js-validation --force

```


##### Validating Form Request
 
```html

<head>
    <link 
    rel="stylesheet" 
    href="{{asset('vendor/mss-js-validation/css/mss-js-validation.min.css')}}">
</head>

<form>
    <!-- ... My form stuff ... -->
</form>

<!-- Javascript Requirements -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('vendor/mss-js-validation/js/mss-js-validation.min.js')}}"></script>

@php
    class Validator {
        function rules(): array {
            return [
                'name'  => 'required|max:255',
                'email' => 'required',
            ];
        }

        function messages(): array {
            return [
                'name.required'  => 'Name is required',
                'name.max'       => 'Name should not more than 225 characters'
                'email.required' => 'Email is required',
            ];
        }
    }
@endphp

<!-- Laravel Javascript Validation -->

{!! MssValidation::script([
    'request'   => new Validator()
]) !!}

```

If you are using Jquery select2 Plugin you can use like this

```html

{!! MssValidation::script([
    'request'   => new Validator(),
    'select2'   => true
]) !!}

```

Or you can use normal request like this

```html

{!! MssValidation::script([
    'request'   => new App\Http\Requests\YourRequestClass(),
]) !!}

```