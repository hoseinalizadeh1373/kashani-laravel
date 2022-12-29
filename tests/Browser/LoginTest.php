<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type("mobile","salam")
                ->press("ورود")
                ->pause(1000)
                ->assertSee("کد ملی")
                ->type("national_code","salam")
                ->press("ورود")
                ->pause(3000)
                ->screenshot('filename');
        });
    }
}
