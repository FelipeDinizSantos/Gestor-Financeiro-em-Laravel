<?php

    $password = 'sua_senha';
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    echo $hashedPassword;