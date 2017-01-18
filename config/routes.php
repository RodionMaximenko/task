<?php
    return array(
        // Auth
        'auth' => 'auth/index', // Controller => Auth , Action => Index

        // Comments
        'comments/delete/([0-9]+)' => 'comments/delete/$1', // Controller => Comments , Action => delete { 1 param }
        'add/message' => 'comments/addMessage', // Controller => Comments , Action => addMessage
        'comments' => 'comments/index', // Controller => Comments , Action => Index

        // Main
        '' => 'main/index' // Controller => Main , Action => Index
    );