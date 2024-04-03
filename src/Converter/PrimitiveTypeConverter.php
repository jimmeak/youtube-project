<?php

namespace Jimmeak\Youtube\Converter;

use Jimmeak\Youtube\Primitive\Type;

class PrimitiveTypeConverter
{
    public static function convert(mixed $value, Type $typeToConvertTo): mixed
    {
        if (Type::BOOLEAN === $typeToConvertTo) {
            return (bool) $value;
        }

        if (Type::INTEGER === $typeToConvertTo) {
            return (int) $value;
        }

        if (Type::FLOAT === $typeToConvertTo) {
            return (float) $value;
        }

        return $value;
    }
}