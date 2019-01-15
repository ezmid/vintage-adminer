<?php
// Override permanent login
// This will cause Adminer to try the login
$_GET['username'] = '';

// The Adminer override
function adminer_object()
{
    class AdminerSoftware extends Adminer
    {
        /**
         * Alter the name
         *
         * @return void
         */
        public function name()
        {
            $names = [
                '~~ Adminer ~~',
                '~~ Renimda ~~',
            ];

            return $names[mt_rand(0, count($names)-1)];
        }

        /**
         * Preconfigure the credentials
         *
         * @return void
         */
        public function credentials()
        {
            // server, username and password for connecting to database
            return ['mysql', 'root', 'root'];
        }

    }

    return new AdminerSoftware();
}

// Downloaded during image build
include_once('./adminer.php');
