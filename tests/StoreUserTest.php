<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StoreUserTest extends WebTestCase
{
    public function test_route_is_successful(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Create New User');
    }
    
    public function test_form_submit_is_successful(): void
    {
        $client = static::createClient();

        // Request the registration form page
        $crawler = $client->request('GET', '/');

        // Fill out and submit the form
        $form = $crawler->selectButton('Create User')->form();
        $form['user_form[firstname]'] = 'John';
        $form['user_form[lastname]'] = 'Doe';
        $form['user_form[email]'] = 'john.doe@example.com';

        $client->submit($form);

        // Check if the form submission was successful
        $this->assertResponseRedirects('/'); // Redirect to success page after form submission
    }
}
