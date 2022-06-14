<?php

class DB
{
    static function getConnection()
    {
        return new SQLite3('/var/top-lang-main-15-20.db');
    }
}
