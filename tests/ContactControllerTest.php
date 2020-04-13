<?php

namespace App\Tests\Controller;

use App\Controller\ContactController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testContactList()
    {
        $client = static::createClient();
        $client->followRedirects(true); 
        $crowler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h4', 'Contacts list');
        
    }

    public function testShowContact()
    {
        $client = static::createClient();
        $client->followRedirects(true); 
        $client->request('GET', '/show/1');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h4', 'Show Contact');
    }

    public function testCreateContact()
    {
       $client = static::createClient();
       $client->followRedirects(true); 
       $client->request('POST', '/createAndEdit');

       $client->submitForm('New contact', [
           'contact[firstname]' => 'Brice',
           'contact[lastname]' => 'WILLIAM',
           'contact[email]' => 'b.william@gmail.com',
           'contact[phoneNumber]' => '0725639378',
       ]);

       $this->assertResponseIsSuccessful();
       $this->assertSelectorTextContains('h4', 'Contacts list');
    }

    public function testDeleteContact()
    {
        $client = static::createClient();
        $client->followRedirects(true); 
        $client->request('DELETE', '/delete/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h4', 'Contacts list');
    }

    public function testEditContact()
    {
        $client = static::createClient();
        $client->followRedirects(true); 
        $client->request('GET', '/createAndEdit/1');

        $client->submitForm('New contact', [
            'contact[firstname]' => 'Brice',
            'contact[lastname]' => 'WILLIAM',
            'contact[email]' => 'b.william@gmail.com',
            'contact[phoneNumber]' => '0725639378',
        ]);
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h4', 'Contacts list');
    }

}

?>