<?php 

namespace joaquinpereira\Pexels\Tests\Feature;

use joaquinpereira\Pexels\Tests\TestCase;
use joaquinpereira\Pexels\Facades\Pexels;
use joaquinpereira\Pexels\Models\User;
use joaquinpereira\Pexels\Models\Video;
use joaquinpereira\Pexels\Models\VideoFile;
use joaquinpereira\Pexels\Models\VideoPicture;

class VideoClientTest extends TestCase
{
    const PAGE = 2;
    const PERPAGE = 5;

    /** @test */
    public function can_search_videos_on_pexels()
    {
        $response = Pexels::video_search('ocean', 2, 5, null, null);

        $this->assertIsArray($response);
    }

    /** @test */
    public function search_videos_on_pexels_return_correct_data()
    {
        $response = Pexels::video_search('ocean', 2, 5, null, null);

        $this->assertArrayHasKey('total_results',$response);
        $this->assertArrayHasKey('page',$response);
        $this->assertArrayHasKey('per_page',$response);
        $this->assertArrayHasKey('videos',$response);

        $this->assertEquals(VideoClientTest::PAGE, $response['page']);
        $this->assertEquals(VideoClientTest::PERPAGE, $response['per_page']);

        $this->assertIsArray($response['videos']);
        $this->assertContainsOnlyInstancesOf(Video::class,$response['videos']);
    }

    /** @test */
    public function can_get_popular_videos_on_pexels()
    {
        $response = Pexels::popular_videos(2, 5);

        $this->assertIsArray($response);
    }

    /** @test */
    public function popular_videos_on_pexels_return_correct_data()
    {
        $response = Pexels::popular_videos(2, 5);

        $this->assertArrayHasKey('total_results',$response);
        $this->assertArrayHasKey('page',$response);
        $this->assertArrayHasKey('per_page',$response);
        $this->assertArrayHasKey('videos',$response);

        $this->assertEquals(VideoClientTest::PAGE, $response['page']);
        $this->assertEquals(VideoClientTest::PERPAGE, $response['per_page']);

        $this->assertIsArray($response['videos']);
        $this->assertContainsOnlyInstancesOf(Video::class,$response['videos']);
    }

    /** @test */
    public function can_get_detail_video_on_pexels()
    {
        $response = Pexels::video_detail(15570408);

        $this->assertInstanceOf(Video::class,$response);

        $this->assertInstanceOf(User::class, $response->user);

        $this->assertIsArray($response->video_files);
        $this->assertContainsOnlyInstancesOf(VideoFile::class, $response->video_files);

        $this->assertIsArray($response->video_pictures);
        $this->assertContainsOnlyInstancesOf(VideoPicture::class, $response->video_pictures);   
    }

    /** @test */
    public function can_get_random_video_on_pexels()
    {
        $response = Pexels::getRandomVideo("terminator");

        $this->assertIsString($response);
        
    }
}