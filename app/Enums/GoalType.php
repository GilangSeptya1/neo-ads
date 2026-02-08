<?php

namespace App\Enums;

enum GoalType: string
{
    case BRAND_AWARENESS = 'brand_awareness';
    case PROMOTION       = 'promotion';
    case EVENT           = 'event';

    /**
     * Get all values for validation / dropdown
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get label for UI
     */
    public function label(): string
    {
        return match ($this) {
            self::BRAND_AWARENESS => 'Brand Awareness',
            self::PROMOTION       => 'Promotion',
            self::EVENT           => 'Event',
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
