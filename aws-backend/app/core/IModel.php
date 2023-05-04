<?php

interface IModel
{
    public function getAll();
    public function getByID($id);
    public function update($data);
    public function delete($data);
    public function insert($data);
}