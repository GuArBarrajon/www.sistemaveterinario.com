<?php
echo $password = "123";

echo md5($password).'<br>';
echo sha1($password).'<br>';
echo password_hash($password, algo: PASSWORD_DEFAULT).'<br>';

$hash = '$2y$10$VqKvRwnS5CcEijbiZDBsgudNBzJPzZhLbRD7VnQuTXv2GypYZBpt6';

if (password_verify($password, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>