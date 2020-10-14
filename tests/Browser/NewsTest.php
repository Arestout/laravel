<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEmptyInput()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/publish')
                ->type('title', '')
                ->type('text', '')
                ->press('Добавить')
                ->assertSee('The Заголовок новости field is required.')
                ->assertSee('The Текст новости field is required.');
        });
    }

    public function testShortTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/publish')
                ->type('title', 'aa')
                ->press('Добавить')
                ->assertSee('The Заголовок новости must be at least 10 characters.');
        });
    }

    public function testSuccessfulSubmit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/publish')
                ->type('title', 'Новая новость')
                ->type('text', 'Текст новой новости')
                ->select('category', 1)
                ->press('Добавить')
                ->assertPathIs('/news/one/11');
        });
    }
}
