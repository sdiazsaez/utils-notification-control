<?php

namespace Cosmoscript\NotificationControl;

class NotificationControl {
    
    protected static bool $disabled = false;

    public static function disable(): void
    {
        self::$disabled = true;
    }

    public static function enable(): void
    {
        self::$disabled = false;
    }

    public static function isDisabled(): bool
    {
        return self::$disabled;
    }

    /**
     * Run a callback with notifications suppressed
     */
    public static function whileDisabled(callable $callback)
    {
        self::disable();

        try {
            return $callback();
        } finally {
            self::enable();
        }
    }
}
