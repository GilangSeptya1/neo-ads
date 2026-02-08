<?php

namespace App\Enums;

enum StickerAreaType: string
{
    case FULL_WRAP     = 'full_wrap';
    case PARTIAL_WRAP  = 'partial_wrap';

    case DOOR_LEFT     = 'door_left';
    case DOOR_RIGHT    = 'door_right';
    case DOOR_BOTH     = 'door_both';

    case HOOD          = 'hood';
    case REAR_WINDOW   = 'rear_window';
    case REAR_BUMPER   = 'rear_bumper';

    case ROOF          = 'roof';
    case SIDE_PANEL    = 'side_panel';
    case MAGNET        = 'magnet';

    /**
     * Human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::FULL_WRAP     => 'Full Body Wrap',
            self::PARTIAL_WRAP  => 'Partial Wrap',

            self::DOOR_LEFT     => 'Left Door',
            self::DOOR_RIGHT    => 'Right Door',
            self::DOOR_BOTH     => 'Both Doors',

            self::HOOD          => 'Hood',
            self::REAR_WINDOW   => 'Rear Window',
            self::REAR_BUMPER   => 'Rear Bumper',

            self::ROOF          => 'Roof',
            self::SIDE_PANEL    => 'Side Panel',
            self::MAGNET        => 'Magnet Sticker',
        };
    }

    /**
     * Dropdown-ready list
     */
    public static function options(): array
    {
        return array_map(
            fn ($case) => [
                'value' => $case->value,
                'label' => $case->label(),
            ],
            self::cases()
        );
    }
}