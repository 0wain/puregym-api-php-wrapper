<?php

test('client initializes', function () {
    expect(client())->toBeInstanceOf(Owainjones74\Puregym\PureGymClient::class);
});

test('access token created', function () {
    expect(client()->access_token)->toBeString();
});
