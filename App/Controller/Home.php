<?php namespace App\Controller;

use App\Lib\Response;

class Home
{
    public function indexAction(Response $res) {
        return $res->view('pages/home', [
            'title' => 'test',
            'body' => 'deneme'
        ]);
    }
}
