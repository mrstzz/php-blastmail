<?php

use function Pest\Laravel\get;
use function Pest\Laravel\getJson;

use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

BeforeEach(function () {
    $this->emailList = EmailList::factory()->create();
    login();
});

it('only logged users can access the subscribers', function() {
    Auth::logout();
    getJson(route('subscribers.index', $this->emailList))
        ->assertUnauthorized();
});


it('should be possible to see the entire list of subscribers', function () {
    Subscriber::factory()->count(4)->create(0); // other email list
    Subscriber::factory()->count(10)->create(['email_list_id' => $this->emailList->id,]);


    get(route('subscribers.index', $this->emailList))
        ->assertViewHas('emailList', $this->emailList)
        ->assertViewHas('subscribers', function ($subscribers) {
            expect($subscribers)->toHaveCount(10);

            expect($subscribers)
            ->first()->email_list_id->toBe($this->emailList->id);

            return true;
        });

});




it('should be able to search subscribers', function () {

    Subscriber::factory()->count(5)->create(['email_list_id' => $this->emailList->id]);

    Subscriber::factory()->create([
        'name' => 'Charlie Smith',
        'email' => 'joe@doe.com',
        'email_list_id' => $this->emailList->id,
    ]);

    // Filtrar com email
    get(route('subscribers.index', ['emailList' => $this->emailList, 'search' => 'joe']))
        ->assertViewHas('subscribers', function ($value) {
            expect($value)
                ->count(1);

            expect($value)->first()->id->toBe(6);

            return true;
        });

    // Filtrar com nome
    get(route('subscribers.index', ['emailList' => $this->emailList, 'search' => 'smith']))
        ->assertViewHas('subscribers', function ($value) {
            expect($value)
                ->count(1);

            expect($value)->first()->id->toBe(6);

            return true;
        });

});



it('should be able to search by id', function () {
    Subscriber::factory()->create([
        'name' => 'Joe Doe',
        'email' => 'joe@doe.com',
        'email_list_id' => $this->emailList->id,
    ]);

    Subscriber::factory()->create([
        'name' => 'Jane Doe',
        'email' => 'jane@doe.com',
        'email_list_id' => $this->emailList->id,
    ]);

    // Filtrar com ID
    get(route('subscribers.index', ['emailList' => $this->emailList, 'search' => 2]))
        ->assertViewHas('subscribers', function ($value) {
            expect($value)
                ->count(1);

            expect($value)->first()->id->toBe(2);

            return true;
        });
});





it('should be able to delete records', function () {})->todo();
it('should be able to export records', function () {})->todo();