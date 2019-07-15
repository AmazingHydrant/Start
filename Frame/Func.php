<?php

function dd($printData)
{
    if (is_bool($printData) or is_null($printData)) {
        var_dump($printData);
    } else {
        echo "<pre>";
        print_r($printData);
        echo "</pre>";
    }
    die;
}
function p($printData)
{
    if (is_bool($printData) or is_null($printData)) {
        var_dump($printData);
    } else {
        echo "<pre>";
        print_r($printData);
        echo "</pre>";
    }
}
function F($obj)
{
    return Factory::getObj($obj);
}
function M($modelName)
{
    $modelName .= 'Model';
    return F($modelName);
}
