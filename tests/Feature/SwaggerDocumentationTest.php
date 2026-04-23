<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SwaggerDocumentationTest extends TestCase
{
    public function test_openapi_json_exists_after_generate(): void
    {
        Artisan::call('l5-swagger:generate');

        $path = storage_path('api-docs/api-docs.json');
        $this->assertFileExists($path);
        $this->assertStringContainsString('"openapi"', (string) file_get_contents($path));
    }

    public function test_swagger_ui_page_returns_ok(): void
    {
        Artisan::call('l5-swagger:generate');

        $this->get('/docs/swagger')
            ->assertOk()
            ->assertSee('Book Library', escape: false);
    }
}
