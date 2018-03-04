<?php

/*
 * CollectTest
 * @desc test collect page is works.
 * @link https://laravel.com/docs/5.0/testing
 */
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\People;

class CollectTest extends TestCase
{

    /**
     * Test this page is online.
     *
     * @return void
     */
    public function testGetPage()
    {
        $response = $this->get('/form');
        $response->assertStatus(200);
    }


    /*
     * Test when post something wrong.
     *
     */
    public function testPostSomethingWrong()
    {
        $this->flushSession();
        $response = $this->post('/form',['first_name'=>'tset']);
        $response->assertSessionHas('errors');
    }

    /*
   * Test when post something wrong.
   *
   */
    public function testPostSuccess()
    {

        $this->flushSession();
        $mock = ['first_name'=>'Filip',
            'last_name'=> 'David',
            'thai_id'=>'1223333322344',
            'birth'=>'20-10-1983',
            'mobile'=>'0988838438',
            'gender'=>'male',
            'address'=>'Cecilia Chapman
                    711-2880 Nulla St.
                    Mankato Mississippi 96522'
            ];
        $response = $this->post('/form', $mock);

        $this->assertDatabaseHas('peoples', [
            'first_name' => $mock['first_name']
        ]);

        //clear data
       // PeoPle::where('first_name',$mock['first_name'])->delete();

    }


}
