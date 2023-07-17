<?php 

namespace joaquinpereira\Pexels\Tests\Feature;

use joaquinpereira\Pexels\Tests\TestCase;
use joaquinpereira\Pexels\Facades\Pexels;
use joaquinpereira\Pexels\Models\Photo;
use joaquinpereira\Pexels\Models\PhotoSize;

class PhotoClientTest extends TestCase
{
    const PAGE = 2;
    const PERPAGE = 5;

    /** @test */
    public function can_search_images_on_pexels()
    {
        $response = Pexels::image_search('dogs',2, 5, null, null, 'red');

        $this->assertIsArray($response);
    }

    /** @test */
    public function search_images_on_pexels_return_correct_data()
    {
        $response = Pexels::image_search('dogs',2, 5, null, null, 'red');

        $this->assertArrayHasKey('total_results',$response);
        $this->assertArrayHasKey('page',$response);
        $this->assertArrayHasKey('per_page',$response);
        $this->assertArrayHasKey('photos',$response);

        $this->assertEquals(PhotoClientTest::PAGE, $response['page']);
        $this->assertEquals(PhotoClientTest::PERPAGE, $response['per_page']);

        $this->assertIsArray($response['photos']);
        $this->assertContainsOnlyInstancesOf(Photo::class,$response['photos']);
    }

    /** @test */
    public function can_get_curated_images_on_pexels()
    {
        $response = Pexels::image_curated(2, 5);

        $this->assertIsArray($response);
    }

    /** @test */
    public function curated_images_on_pexels_return_correct_data()
    {
        $response = Pexels::image_curated(2, 5);

        $this->assertArrayHasKey('total_results',$response);
        $this->assertArrayHasKey('page',$response);
        $this->assertArrayHasKey('per_page',$response);
        $this->assertArrayHasKey('photos',$response);

        $this->assertEquals(PhotoClientTest::PAGE, $response['page']);
        $this->assertEquals(PhotoClientTest::PERPAGE, $response['per_page']);

        $this->assertIsArray($response['photos']);
        $this->assertContainsOnlyInstancesOf(Photo::class,$response['photos']);
    }

    /** @test */
    public function can_get_detail_image_on_pexels()
    {
        $response = Pexels::image_detail(17579690);

        $this->assertInstanceOf(Photo::class,$response);
        $this->assertInstanceOf(PhotoSize::class, $response->sizes);
    }

    /** @test */
    public function can_get_random_image_on_pexels()
    {
        $response = Pexels::getRandomImage("beach");

        $this->assertIsString($response);
    }

}