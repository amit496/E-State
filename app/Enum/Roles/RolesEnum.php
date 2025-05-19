<?php

namespace App\Enum\Roles;
enum RolesEnum: int
{
    case SUPERADMIN = 1;
    case ADMIN = 2;
    case SUBADMIN = 3;
    case AGENT = 4;
    case CUSTOMER = 5;

    public function label(): string
    {
        return match ($this) {
            self::SUPERADMIN => 'Super Admin',
            self::ADMIN => 'Admin',
            self::SUBADMIN => 'Sub Admin',
            self::AGENT => 'Agent',
            self::CUSTOMER => 'Customer',
        };
    }
}
