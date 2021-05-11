<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function migration_test_table_has_the_columns()
    {
        $this->assertTrue(Schema::hasTable('articles'));

        $this->assertTrue(
            Schema::hasColumns('articles', [
                'id', 'title', 'body',
            ]), 'Articles migration/table columns exception');
    }

    /** @test */
    public function get_all_articles_on_the_homepage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/all');
        $response->assertSee('yes');
        $response->assertSuccessful(); //route
        $response->assertViewIs('articles.index'); //view
        // $response->assertViewHas('articles'); //controller
    }






}
