<?php

test('can get member', function () {
    $member = client()->member();
    expect($member)->toBeInstanceOf(Owainjones74\Puregym\Member::class);
});

test('client is passed through', function () {
    $member = client()->member();
    expect($member->client)->toBeInstanceOf(Owainjones74\Puregym\PureGymClient::class);
});

test('can pull activity', function () {
    $member = client()->member();

    expect($member->activity())->toBeInstanceOf(Owainjones74\Puregym\Activity::class);
});

test('can find home gym', function () {
    $member = client()->member();

    expect($member->homeGym())->toBeInstanceOf(Owainjones74\Puregym\Gym::class);
});

