<?php

// Redirect to page
function redirect($page = FALSE, $message = NULL, $message_type = NULL)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    // check for message
    if ($message != NULL) {
        $_SESSION['message'] = $message;
    }

    // check for type
    if ($message_type != NULL) {
        // set message type
        $_SESSION['message_type'] = $message_type;
    }

    // redirect
    header('Location: ' . $location);
    exit;
}

// Display message
function displayMessage()
{
    if (!empty($_SESSION['message'])) {
        // assign message var
        $message = $_SESSION['message'];
        if (!empty($_SESSION['message_type'])) {
            // assign type var
            $message_type = $_SESSION['message_type'];
            // show alert output
            if ($message_type == 'fail') {
                echo '<div class="alert alert-danger" style="z-index: 1000">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success" style="z-index: 1000">' . $message . '</div>';
            }
        }

        // unset message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}


function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
