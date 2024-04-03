<?php

namespace Jimmeak\Youtube\Primitive;

enum Type: string
{
    case STRING = 'string';
    case INTEGER = 'int';
    case FLOAT = 'float';
    case BOOLEAN = 'bool';
    case ARRAY = 'array';
    case OBJECT = 'object';
    case NULL = 'null';
}