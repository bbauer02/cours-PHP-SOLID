<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

$n1 = new ManageNews(new Log, "Article PHP");
sleep(2);
$n2 = new ManageNews(new Log, "Article MySQL");
sleep(1);
$n3 = new ManageNews(new Log, "Article JS");
sleep(1);
$n4 = new ManageNews(new Log, "Article MongoDB");
sleep(1);
$n5 = new ManageNews(new Log, "Article Python");

var_dump(Log::getStorage());