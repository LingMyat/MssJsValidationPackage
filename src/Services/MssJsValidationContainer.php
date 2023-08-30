<?php
namespace Lingmyat\MssJsValidation\Services;

use Illuminate\Http\Request;
use Lingmyat\MssJsValidation\Contracts\MssJsValidationFrame;


class MssJsValidationContainer implements MssJsValidationFrame
{
    public function validate(Request $request) :void
    {
        $rules      = json_decode($request->rules, true);
        $messages   = json_decode($request->messages, true);
        $messages   = $messages?$messages:[];
        $request->validate($rules,$messages);
    }

    public function script(array $array) :string
    {
        $keys           = json_encode($array['keys']);
        $rules          = json_encode($array['request']->rules());
        $messages       = json_encode($array['request']->messages()??[]);
        $select2        = isset($array['select2'])? $array['select2']: 0;
        $fileValidate   = isset($array['fileValidate'])? $array['fileValidate']: true ;

        return "<script>
                    $(function () {
                        let submitBtn;
                        const keys          = $keys;
                        const select2       = $select2;
                        const rules         = $rules;
                        const messages      = $messages;
                        const fileValidate  = $fileValidate;

                        if($('#submit-btn').length > 0) {
                            submitBtn = $('#submit-btn');
                        } else {
                            submitBtn = $('button[type='+'submit'+']');
                        }

                        submitBtn.click(function (e) {
                            e.preventDefault();
                            validateNew({
                                keys: keys,
                                rules: rules,
                                messages: messages,
                                submit: true,
                                select2: select2,
                                fileValidate: fileValidate
                            })
                        });
                    });
                </script>";
    }
}
