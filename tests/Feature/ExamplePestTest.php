<?php




test('redireciona para login', function () {
    $this->get('/')
        ->assertRedirect(route('login'));
});

it('should redirect to login', function () {
    $this->get('/')
        ->assertRedirect(route('login'));
});