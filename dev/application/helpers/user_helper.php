<?php
defined('BASEPATH') or exit('No direct script access allowed');

function bCrypt($pass, $cost)
{
    $chars = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    // Build the beginning of the salt
    $salt = sprintf('$2a$%02d$', $cost);

    // Seed the random generator
    mt_srand();

    // Generate a random salt
    for ($i = 0; $i < 22; $i++) $salt .= $chars[mt_rand(0, 63)];

    // return the hash
    return crypt($pass, $salt);
}

function get_user_info($param = NULL)
{
    $_this = &get_instance(); // agar bisa mengakses bawaan ci
    if ($param != null) {
        return $_this->session->userdata($param); //bawaan ci
    } else {
        return $_this->session->userdata;
    }
}

function GeraHash($qtd)
{
    //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash = NULL;
    for ($x = 1; $x <= $qtd; $x++) {
        $Posicao = rand(0, $QuantidadeCaracteres);
        $Hash .= substr($Caracteres, $Posicao, 1);
    }

    return $Hash;
}
