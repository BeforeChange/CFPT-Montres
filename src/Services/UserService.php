<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\User;

class UserService extends Service {
    public function register(array $data): bool {
        $user = new User($this->db);
        $user->email = $data['email'];
        $user->password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $result = $user->save();

        return $result;
    }

    public function login(string $email, string $password): bool {

        $user = new User($this->db);
        $user->findByEmail($email);

        $result = $user->checkPassword($password);

        if(!$result)
            return false;

        $_SESSION['user_id'] = $user->id;

        return true;
    }

    public function logout(): bool {
        unset($_SESSION['user_id']);
        return true;
    }

    public function getCurrentUser() {
        $user = new User($this->db);
        $user->find($_SESSION['user_id']);

        if($user == null)
            return false;

        unset($user->password_hash);

        return $user;
    }
}