<?php

use function Pest\Laravel\get;
use function Pest\Laravel\getJson;

use App\Models\EmailList;



BeforeEach(function () {
    $this->emailList = EmailList::factory()->create();
});

it('only logged users can access the subscribers', function() {
    getJson(route('subscribers.index', $this->emailList))
        ->assertUnauthorized();
});


it('should be possible to see the entire list of subscribers', function () {})->todo();
it('should be able to search subscribers', function () {})->todo();
it('should be able to delete records', function () {})->todo();
it('should be able to export records', function () {})->todo();