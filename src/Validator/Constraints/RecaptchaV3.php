<?php

declare(strict_types=1);

namespace Leapt\CoreBundle\Validator\Constraints;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class RecaptchaV3 extends Recaptcha
{
    public string $message = 'The submitted captcha is invalid.';

    public static string $technicalMessage = 'The submitted captcha is invalid. Error codes: {{ errorCodes }}. Score: {{ score }}.';

    public function validatedBy(): string
    {
        return RecaptchaV3Validator::class;
    }
}
