<?php
class Flasher
{
    public static function setFlash($massage, $action, $type)
    {
        $_SESSION['flash'] = [
            'massage' => $massage,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                New friends list has been <strong>' . $_SESSION['flash']['massage'] . '</strong> to ' . $_SESSION['flash']['action'] . '.

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';

            unset($_SESSION['flash']);
        }
    }
}
