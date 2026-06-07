<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Content;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuPdfTest extends TestCase
{
    use RefreshDatabase;

    public function test_menu_pdf_edit_requires_authentication()
    {
        $response = $this->get(route('admin.menu.pdf.edit'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_menu_pdf_edit_accessible_with_auth_session()
    {
        $response = $this->withSession([
            'admin_authenticated' => true,
            'admin_token' => 'test-token'
        ])->get(route('admin.menu.pdf.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.menu.pdf');
    }

    public function test_menu_pdf_update_saves_file_and_database()
    {
        Storage::fake('public');

        $pdf = UploadedFile::fake()->create('carte_boissons.pdf', 100, 'application/pdf');

        $response = $this->withSession([
            'admin_authenticated' => true,
            'admin_token' => 'test-token'
        ])->put(route('admin.menu.pdf.update'), [
            'pdf' => $pdf,
            'type' => 'drinks'
        ]);

        $response->assertRedirect(route('admin.menu.index'));
        $response->assertSessionHas('success');

        // Check if database was updated
        $content = Content::where('key', 'drinks_pdf')->first();
        $this->assertNotNull($content);
        $this->assertNotEquals('boissons.pdf', $content->content);
        $this->assertStringEndsWith('.pdf', $content->content);

        // Check if file was stored on public disk
        Storage::disk('public')->assertExists($content->content);
    }

    public function test_food_pdf_update_saves_file_and_database()
    {
        Storage::fake('public');

        $pdf = UploadedFile::fake()->create('carte_repas.pdf', 100, 'application/pdf');

        $response = $this->withSession([
            'admin_authenticated' => true,
            'admin_token' => 'test-token'
        ])->put(route('admin.menu.pdf.update'), [
            'pdf' => $pdf,
            'type' => 'food'
        ]);

        $response->assertRedirect(route('admin.menu.index'));
        $response->assertSessionHas('success');

        // Check if database was updated
        $content = Content::where('key', 'food_pdf')->first();
        $this->assertNotNull($content);
        $this->assertNotEquals('menu.pdf', $content->content);
        $this->assertStringEndsWith('.pdf', $content->content);

        // Check if file was stored on public disk
        Storage::disk('public')->assertExists($content->content);
    }
}
