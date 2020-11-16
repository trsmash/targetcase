<?php namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends Repository
{
    /**
     * UserRepository constructor.
     * @param User $price
     */
    public function __construct(User $price)
    {
        parent::__construct($price);
    }

    /**
     * Helper function for getting a user model by email address
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->model->newQuery()
            ->where('email', '=', $email)
            ->first();
    }
}