<?php namespace App\Controller;

use App\Lib\Request;
use App\Lib\Response;

class Contact
{
    public function saveContact(Request $req, Response $res) 
    {
        $contactPost = $req->getJSON();

        if(count((array) $contactPost) < 1) {
            return $res->status(400)->toJSON([
                'info' => 'Girdiler alınmadı'
            ]);
        }

        if(!isset($contactPost->name) || strlen($contactPost->name) < 1) {
            return $res->status(400)->toJSON([
                'info' => 'Size hitap edebilmemiz için adınız ve soyadınızı ekleyiniz'
            ]);
        }

        if(strlen($contactPost->name) < 5) {
            return $res->status(400)->toJSON([
                'info' => 'Gerçek adınızı ve soyadınızı yazınız'
            ]);
        }

        if(!isset($contactPost->phone) || strlen($contactPost->phone) < 1) {
            return $res->status(400)->toJSON([
                'info' => 'Size ulaşabilmemiz için telefon numaranızı yazınız'
            ]);
        }

        if(!preg_match("/^([0-9\s\-\+\(\)]*)$/", $contactPost->phone) || strlen($contactPost->phone) <= 12 || strlen($contactPost->phone) >= 16) {
            return $res->status(400)->toJSON([
                'info' => 'Size ulaşabilmemiz için geçerli bir telefon numarası yazınız'
            ]);
        }

        if(!isset($contactPost->kvvk) || $contactPost->kvvk != 1) {
            return $res->status(400)->toJSON([
                'info' => 'KVVK metnini kabul etmelisiniz'
            ]);
        }

        if(!isset($contactPost->email) || strlen($contactPost->email) < 1 || !filter_var($contactPost->email, FILTER_VALIDATE_EMAIL)) {
            return $res->status(400)->toJSON([
                'info' => 'Size ulaşabilmemiz için geçerli bir e-posta adresi yazınız'
            ]);
        }

        if(!isset($contactPost->message) || strlen($contactPost->message) < 10) {
            return $res->status(400)->toJSON([
                'info' => 'Mesajınız 10 karakterden uzun yazılmalı. Lütfen ihtiyacınızı/probleminizi detaylandırın'
            ]);
        }

        return $res->status(200)->toJSON([
            'info' => 'İletiniz bize ulaştı. En kısa zamanda sizinle irtibat kuracağız',
            'data' => $contactPost
        ]);
    }
}