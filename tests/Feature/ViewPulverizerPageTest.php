<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewPulverizerPageTest extends TestCase
{
    #[Test]
    public function a_request_to_the_black_pulverizer_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizer/black')->assertOk()->assertViewIs('pulverizer');
    }

    #[Test]
    public function a_request_to_the_blue_pulverizer_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizer/blue')->assertOk()->assertViewIs('pulverizer');
    }

    #[Test]
    public function a_request_to_the_green_pulverizer_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizer/green')->assertOk()->assertViewIs('pulverizer');
    }

    #[Test]
    public function a_request_to_the_red_pulverizer_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizer/red')->assertOk()->assertViewIs('pulverizer');
    }

    #[Test]
    public function a_request_to_the_yellow_pulverizer_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizer/yellow')->assertOk()->assertViewIs('pulverizer');
    }

    #[Test]
    public function a_request_to_the_white_pulverizer_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizer/white')->assertOk()->assertViewIs('pulverizer');
    }
}
