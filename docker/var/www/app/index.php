<?php
/**
 * Override for permanent auto-login.
 *
 * To make it work you need to provide credentials and a database name.
 * ps: Feel free to add cool names.
 */
$_GET['username'] = ''; // This line forces Adminer to trigger the auto-login
function adminer_object()
{
    class AdminerSoftware extends Adminer
    {
        /**
         * In case there is no environment database specified use this default
         * @var string
         */
        const DEFAULT_DATABASE = 'project';

        /**
         * In case there is no environment database specified use this default.
         * @var string
         */
        const DEFAULT_HOST = 'mysql';

        /**
         * In case there is no environment database specified use this default.
         * @var string
         */
        const DEFAULT_USERNAME = 'root';

        /**
         * In case there is no environment database specified use this default.
         * @var string
         */
        const DEFAULT_PASSWORD = 'root';

        /**
         * Get the desired auto-login database name
         * @return string
         */
        public function database(): string
        {
            return isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : static::DEFAULT_DATABASE;
        }

        /**
         * Disable empty password check
         */
        public function login(): bool
        {
            return true;
        }

        /**
         * The auto-login credentials
         * @return array
         */
        public function credentials(): array
        {
            // server, username and password for the connection
            return [
                isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : static::DEFAULT_HOST,
                isset($_ENV['DB_USERNAME']) ? $_ENV['DB_USERNAME'] : static::DEFAULT_USERNAME,
                isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : static::DEFAULT_PASSWORD
            ];
        }
    }

    return new AdminerSoftware();
}

# Downloaded during image build
require_once('./adminer.php');
