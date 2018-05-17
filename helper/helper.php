<?php

function showStatus($status)
{
    switch ($status) {
        case 1:
            return 'Planning';
        case 2:
            return 'Doing';
        case 3:
            return 'Done';
        default:
            return 'Undefined!';
    }
}

function formAction($contrl, $action)
{
    echo ROOT_URL . '?p=' . $contrl . '&amp;a=' . $action;
}

function dd($data)
{
    return var_dump($data);
}
