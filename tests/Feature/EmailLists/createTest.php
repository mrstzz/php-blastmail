<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;

class CreateTest extends TestCase
{
    public function test_it_should_be_create_an_email_list()
    {

        $this->withoutExceptionHandling();

        // Arrange

        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'title' => 'Email List Test',
            'file' => UploadedFile::fake()->createWithContent('email_list.csv',<<<'CSV'
            name,email
            Joe Doe,joe@doe.com
            CSV),
        ];

        // Act
        $request = $this->post(route('email-list.create'), $data);


        // Assert
        $request->assertOk();

        $this->assertDatabaseHas('email_lists', [
            'title' => 'Email List Test'
        ]);

        $this->assertDatabaseHas('email_lists', [
            'email_list_id' => 1,
            'name' => 'Joe Doe',
            'email' => 'joe@doe.com'
        ]);


    }
}