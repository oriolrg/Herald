<?php

/**
 * Created by PhpStorm.
 * User: oriol
 * Date: 21/09/16
 * Time: 21:41
 */
class ItemCRUD2ControllerTest extends \TestCase
{
    public function testCrearArticle()
    {
        $client = static::createClient();
        $this->validate($request, [

            'title' => 'required',

            'description' => 'required|max:140',

            'contingut' => 'required',

            'user_id' => 'required',

            'seccio_id' => 'required',

            'path'=>'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:1000',

        ]);
        $crawler = $client->request(
            'POST',
            '/',
            array(
                'title'        => "aaaaaaaa",
                'description' => 'requir',

                'contingut' => 'red',

                'user_id' => '1',

                'seccio_id' => '1',

                'path'=>'\',
            array(),
            array());
    }

    public function testUpdate()
    {
        $this->assertTrue(true);
    }
}
