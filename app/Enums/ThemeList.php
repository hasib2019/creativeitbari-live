<?php

namespace App\Enums;

enum ThemeList: string
{
    case MAIN = 'home_main';
    case TWO = 'home_two';
    case THREE = 'home_three';
    case SHOP = 'home_shop';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function themes(): object
    {
        return (object) [
            (object) [
                'slug' => self::MAIN->value,
                'title' => "Digital Marketing",
                'preview' => 'admin/img/demo/home-main.jpg',
            ],
            (object) [
                'slug' => self::TWO->value,
                'title' => "It Solutions",
                'preview' => 'admin/img/demo/home-it-solutions.jpg',
            ],
            (object) [
                'slug' => self::THREE->value,
                'title' => "Mobile App",
                'preview' => 'admin/img/demo/home-mobile-app.jpg',
            ],
            (object) [
                'slug' => self::SHOP->value,
                'title' => "Shop",
                'preview' => 'admin/img/demo/home-shop.jpg',
            ],
        ];
    }

}
