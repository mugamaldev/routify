<?php

namespace App;

enum UserRole :string 
{
    case ADMIN = 'admin';
    case USER = 'user';
    case INSTRUCTOR = 'instructor';

     public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
