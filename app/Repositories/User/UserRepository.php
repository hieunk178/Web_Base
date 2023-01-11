<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
    private User $user;
    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function count(){
        $count = [];
        $count['all_user'] = $this->user->withTrashed()->count();
        $count['user_active'] = $this->user->all()->count();
        $count['user_remove'] = $this->user->onlyTrashed()->count();
        return $count;
    }

    public function find($id)
    {
        $result = $this->user->withTrashed()->find($id);

        return $result;
    }
    public function getAllUser($search)
    {
        return $this->user->withTrashed()->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function getUserActive($search)
    {
        return $this->user->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function getUserRemove($search)
    {
        return $this->user->onlyTrashed()->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function create($user){
        return $this->user->create($user);
    }
    public function updateUser($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function remove($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
    public function restore($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->restore();

            return true;
        }

        return false;
    }
    

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->forceDelete();
            return true;
        }

        return false;
    }
    public function total(){
        return $this->user->total();
    }
}