<?php

namespace App\Tests\Util;

use App\Entity\Contact;
use App\Controller\ContactController;
use PHPUnit\Framework\TestCase;

class ContactControllerTest extends TestCase
{

    private $contact;

    protected function setUp()
    {
      $this->contact = new Contact();
    }

    protected function tearDown()
    {
      $this->contact = NULL;
    }


    public function testEqualsFirstname()
    {
       $firstname = $this->contact->setFirstname('Brice');
       $this->assertEquals('Brice', $this->contact->getFirstname());
    }

    public function testTypeFirstname(): void
    {
        $firstname = $this->contact->setFirstname('Lightning');
        $this->assertIsString($this->contact->getFirstname());
    }


    public function testEqualsLastname()
    {
       $lastname = $this->contact->setLastname('WILLIAM');
       $this->assertEquals('WILLIAM', $this->contact->getlastname());
    }

    public function testTypeLastname(): void
    {
        $lastname = $this->contact->setLastname('Snow');
        $this->assertIsString($this->contact->getLastname());
    }


    public function testEqualsEmail()
    {
       $email = $this->contact->setEmail('brice.william971@gmail.com');
       $this->assertEquals('brice.william971@gmail.com', $this->contact->getEmail());
    }

    public function testTypeEmail(): void
    {
        $email = $this->contact->setEmail('Sera@gmail.com');
        $this->assertIsString($this->contact->getEmail());
    }


    public function testEqualsPhoneNumber()
    {
       $phoneNumber = $this->contact->setPhoneNumber(0756364157);
       $this->assertEquals(0756364157, $this->contact->getPhoneNumber());
    }

    public function testTypePhoneNumber(): void
    {
        $phoneNumber = $this->contact->setPhoneNumber(0756364157);
        $this->assertIsInt($this->contact->getPhoneNumber());
    }

}

?>