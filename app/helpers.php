<?php

function formatDate($date, $format = 'long'): string {
    if ($format === 'short') {
        return (int)date('d') !== (int)date('d', strtotime($date)) ? date('d M',strtotime($date)) : date('h:i A',strtotime($date));
    }
    return (int)date('d') !== (int)date('d', strtotime($date)) ? date('h:i A, d M',strtotime($date)) : date('h:i A',strtotime($date));
}

function getUser()
{
    return Auth::user();
}

function getUserInitials($email): string {
    $middle = floor(strlen(preg_split('/[@]/', $email)[0])/2);
    return substr($email,0,1).substr($email,$middle,1);
}