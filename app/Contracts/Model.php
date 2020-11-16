<?php namespace App\Contracts;

interface Model
{
    public function newInstance();
    public function fill(array $attributes);
    public function save();
    public function delete();
}