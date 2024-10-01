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
