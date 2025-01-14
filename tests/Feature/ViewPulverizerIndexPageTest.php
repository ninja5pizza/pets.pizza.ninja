<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewPulverizerIndexPageTest extends TestCase
{
    #[Test]
    public function a_request_to_the_pulverizer_singular_url_should_redirect(): void
    {
        $this->get('/pulverizer')->assertRedirect('/pulverizers');
    }

    #[Test]
    public function a_request_to_the_pulverizers_index_page_should_return_a_200_status_code(): void
    {
        $this->get('/pulverizers')->assertOk()->assertViewIs('pulverizers.index');
    }
}
