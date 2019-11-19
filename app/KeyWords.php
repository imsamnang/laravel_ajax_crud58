<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
 
class KeyWords extends Model
{
    public function getKeyWords()
    {
        return Redis::get('searchKeyWords');
    }
}