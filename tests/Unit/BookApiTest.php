<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class BookApiTest extends TestCase
{
    /**
     * A basic test example.
     * @group read
     * @return void
     */
    public function testRead() {
        
        $books = factory(Book::class, 2)->create()->map(function ($book) {
            return $book->only(['id', 'title', 'author_fullname','description', 'published_date']);
        });
        
        $response = $this->get(route('books'));
        $response->assertStatus(200);

    }

    /**
     * @group singlebook
     * @return void
     */
    public function testReadById() {

        $book = factory(Book::class)->create();
        
        $this->get(route('book.read', $book->id))
            ->assertStatus(200);
    }

    /**
     * @group store
     * @return void
     */

    public function testStoreBook() {

        $data = [
            'title' => $this->faker->sentence,
            'author_fullname'=> $this->faker->firstName().' '.$this->faker->lastName(),
            'published_date' => $this->faker->date,
            'description' => $this->faker->paragraph
        ];

        $this->post(route('book.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * @group update
     * @return void
     */
    public function testUpdateBook()
    {
        $book = factory(Book::class)->create();

        $data = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        $this->put(route('book.update', $book), $data)
            ->assertStatus(200)
            ->assertJson($data)
            ->getContent();

    }

    /**
     * @group delete
     * @return void
     */
    public function testDeleteBook() {

        $book = factory(Book::class)->create();

        $this->delete(route('book.delete', $book->id))
            ->assertStatus(204);
    }

    /**
     * @group find
     * @return void
     */
    public function testFindBook() {

        $book = factory(Book::class)->create();
        $this->get(route('book.find', $book->id))
            ->assertStatus(200);
    }

}
