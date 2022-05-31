<?php

class Log{

    private static array $storage = [];
    private static int $count = 0;

    static public function addLog( string $date){

        self::$storage[] = [
            'date' => $date,
            'count' => ++self::$count
        ];
    }

    static function getStorage():array{

        return self::$storage;
    }

}