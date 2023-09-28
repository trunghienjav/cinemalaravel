<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FilmStatusEnum extends Enum
{
    public const HET_CHIEU = 1;
    public const DANG_CHIEU = 2;
    public const SAP_CHIEU = 3;

    public static function getStatusFilmToDisplay() : array
    {
        return [
            'Hết chiếu' => self::HET_CHIEU,
            'Đang chiếu' => self::DANG_CHIEU,
            'Sắp chiếu' => self::SAP_CHIEU,
        ];
    }

    public static function getKeyByValue($value)
    {
        return array_search($value, self::getStatusFilmToDisplay(), true);
        //buổi 15 chuyên sâu, key: search by value, anh Long chỉ rễ hiểu vkl
        //hàm này để lấy ra cái enum để in ra bên control
    }
}
