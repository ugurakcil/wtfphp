<?php 
use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;
use App\Controller\Home;
use App\Controller\Contact;


Router::get('/about', function (Request $req, Response $res) {
    (new Home())->indexAction($res);
});

Router::post('/contact', function(Request $req, Response $res) {
    (new Contact())->saveContact($req, $res);
});





/*
Posts::load();

Router::get('/post', function (Request $req, Response $res) {
    $res->toJSON(Posts::all());
});

Router::post('/post', function (Request $req, Response $res) {
    $post = Posts::add($req->getJSON());
    $res->status(201)->toJSON($post);
});

Router::get('/post/([0-9]*)', function (Request $req, Response $res) {
    $post = Posts::findById($req->params[0]);
    if ($post) {
        $res->toJSON($post);
    } else {
        $res->status(404)->toJSON(['error' => "Not Found"]);
    }
});
*/