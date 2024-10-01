<?php

test('can get member', function () {
    $member = client()->member();
    expect($member)->toBeInstanceOf(Owainjones74\Puregym\Member::class);
});
test('client is passed through', function () {
    $member = client()->member();
    expect($member->client)->toBeInstanceOf(Owainjones74\Puregym\PureGymClient::class);
});
