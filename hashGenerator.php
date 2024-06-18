<?php

    $password = 'manu123';
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    echo $hashedPassword;