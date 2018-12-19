<?php
class model
{
    public function insert($query, $data=NULL)
    {
        return DB::insert($query, $data);
    }

    public function exec($query, $data=NULL)
    {
        return DB::exec($query, $data);
    }

    public function getVar($query, $data=NULL)
    {
        return DB::getVar($query, $data);
    }

    public function getRow($query, $data=NULL)
    {
        return DB::getRow($query, $data);
    }

    public function get($query, $data=NULL)
    {
        return DB::get($query, $data);
    }
}