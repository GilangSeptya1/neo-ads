<?php

namespace App\Enums;

enum OrderStatus: string
{
    case DRAFT              = 'draft';
    case ON_REVIEW          = 'on_review';
    case SEARCHING_PARTNER  = 'searching_partner';
    case START              = 'start';
    case COMPLETED          = 'completed';
    case CANCEL             = 'cancel';

    /**
     * Human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::DRAFT             => 'Draft',
            self::ON_REVIEW         => 'On Review',
            self::SEARCHING_PARTNER => 'Searching Partner',
            self::START             => 'Start',
            self::COMPLETED         => 'Completed',
            self::CANCEL            => 'Cancel',
        };
    }

    /**
     * Dropdown list
     * [
     *   ['value' => 'draft', 'label' => 'Draft'],
     *   ...
     * ]
     */
    public static function dropdown(): array
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
