<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewHomepageTest extends TestCase
{
    #[Test]
    public function a_request_to_the_homepage_should_return_a_200_status_code(): void
    {
        $this->get('/')->assertOk()->assertViewIs('welcome');
    }
}
