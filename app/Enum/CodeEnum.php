<?php

namespace App\Enum;

class CodeEnum
{
    const SUCCESS               = [200, 'Operación exitosa'];
    const INC_SUCCESS           = [201, 'agregado exitosamente'];
    const FAIL                  = [400, 'operación fallida'];
    const ERR_EMAIL_OR_PASSWORD = [400, 'El Usuario o Contraseña son incorrectos'];
    const NOT_PERMISSION        = [401, 'Permisos insuficientes'];
    const ERROR_REGISTER        = [400, 'Error al registrar'];
    const ERROR_PASSWORD_RESET       = [400, 'Error al intentar cambiar la contraseña'];
    const ERROR_PASSWORD_RESET_HAS_BEEN       = [400, 'A password reset token has been sent to your email, please enter the password reset page to reset your password'];
}
