<?php

function email($to, $subject, $body){
    mail($to, $subject, $body, 'From: helpdesk2k19@gmail.com');
}

function logged_in_redirect()
{
    if (logged_in() === true) {
        header('Location:index.php');
    }
}

function protect_page()
{
    if (logged_in() === false) {
        header('Location:protected.php');
    }
}
function admin_protect()
{
    global $user_data;
    if(is_admin($_SESSION['user_id']) == 1){
        header('Location:index.php');
    }
}

function array_sanitize($item)
{
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $item = htmlentities(strip_tags(mysqli_real_escape_string($link, $item)));

}
function sanitize($data)
{
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    return htmlentities(strip_tags(mysqli_real_escape_string($link, $data)));
}

function output_errors($errors)
{

    return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}
