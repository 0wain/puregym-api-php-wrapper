<?php

test('can get gyms', function () {
    $gyms = client()->allGyms();
    expect($gyms)->toBeArray();
});
test('all returned gyms are gym class', function () {
    $gyms = client()->allGyms();

    foreach($gyms as $gym) {
        expect($gym)->toBeInstanceOf(Owainjones74\Puregym\Gym::class);
    }
});
test('client is passed through', function () {
    $gyms = client()->allGyms();

    foreach($gyms as $gym) {
        expect($gym->client)->toBeInstanceOf(Owainjones74\Puregym\PureGymClient::class);
    }
});
