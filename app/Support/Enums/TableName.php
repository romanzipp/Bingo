<?php

namespace Support\Enums;

class TableName extends AbstractEnum
{
    public const SUPPORT_JOBS = 'support-jobs';
    public const SUPPORT_FAILED_JOBS = 'support-failed_jobs';

    public const USER_USERS = 'user-users';
    public const USER_PASSWORD_RESETS = 'user-password_resets';

    public const GAME_GAMES = 'game-games';
    public const GAME_BOARDS = 'game-boards';
    public const GAME_CARDS = 'game-cards';
}
