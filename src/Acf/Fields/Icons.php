<?php

namespace App\Acf\Fields;

use Extended\ACF\Fields\Select;

class Icons
{
    public static function make(string $label, string $id)
    {
        return Select::make($label, $id)->choices([
            'none' => 'none',
            'arrow' => 'arrow',
            'address' => 'address',
        ])
            ->default('none');
    }
}
