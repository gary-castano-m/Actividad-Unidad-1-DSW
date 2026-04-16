<?php
class InvalidAsignaturaNumeroCreditosException extends InvalidArgumentException
{
    public static function becauseValueIsNotPositive($value)
    {
        return new self('El número de créditos debe ser un entero positivo. Valor recibido: ' . $value);
    }
}