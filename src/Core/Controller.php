<?php

namespace Core;

use PDO;
use Models\Users;
use Models\Habits;

class Controller
{
    private ?PDO $pdo = null;
    private ?Users $usersModel = null;
    private ?Habits $habitsModel = null;

    public function usersModel(): Users
    {
        if ($this->usersModel === null) {
            $database = new Database(config: Config::database());
            $this->pdo = $database->connect();
            $this->usersModel = new Users(connection: $this->pdo);
        }

        return $this->usersModel;
    }

    public function habitsModel(): Habits
    {
        if ($this->habitsModel === null) {
            $database = new Database(config: Config::database());
            $this->pdo = $database->connect();
            $this->habitsModel = new Habits(connection: $this->pdo);
        }

        return $this->habitsModel;
    }

    /**
     * Render a PHP view with optional data
     *
     * @param string $path The relative path to the view file
     * @param array $data Optional associative array of data to pass to the view
     *                    Keys become variable names inside the view
     *
     * @throws Exception if the $path is empty
     */
    protected function renderView(string $path, array $data = []): void
    {
        // Ensure a valid view path is provided
        if (empty($path)) {
            throw new \Exception(message: "View path must not be empty.");
        }

        // Extract data array into variables for use within the view
        // e.g., ['errors' => ..., 'old' => ...] becomes $errors, $old in the view
        extract($data);

        // Include the resolved view file
        // view() is assumed to return the full file path for the view
        require view("pages/{$path}");
    }
}
