<?php

test('client initializes', function () {
    expect(client())->toBeInstanceOf(Owainjones74\Puregym\PureGymClient::class);
});
