# PureGym PHP API Wrapper

This is a PHP wrapper for the PureGym Mobile API. This API is not public facing and is subject to change at any time without notice by the PureGym devs.

Massive credit to [2t6h/puregym-attendance](https://github.com/2t6h/puregym-attendance) for their work in reverse engineering the API. This library is based on their work.

## Installation

1. Install the package with composer `composer require owainjones74/puregym-api-wrapper`
2. Require the composer autoloader `require 'vendor/autoload.php';` if required.
3. Create a new instance of the PureGymClient with your email and pin `$client = new PureGymClient('my@email.com', '12345678');`

## Tests

1. Install the dev dependencies with `composer install --dev`
2. Create a `.env` file in the root of the project with the following contents:
```dotenv
PUREGYM_USERNAME=my@email.com # Your puregym email
PUREGYM_PASSWORD=12345678 # Your puregym pin
```
3. Run the tests with `composer test`

## Usage

```php
require 'vendor/autoload.php';

use Owainjones74\Puregym\PureGymClient;

// Pass your puregym account email and pin. This is the same email and pin you use to login to the PureGym app.
$client = new PureGymClient('my@email.com', '12345678');

// Get your member
$member = $client->member();

// Echo out your name
echo $member->firstName . ' ' . $member->lastName;
```

## Documentation

### Owainjones74\Puregym\PureGymClient

The core client for interacting with the PureGym API.

#### Example
```php
$client = new PureGymClient('your@email.com`, '12345678');
$member = $client->member(); // The member linked to this information
```

#### Methods

##### ->member(): Owainjones74\Puregym\Member

Returns the member linked to the email and pin provided when creating the client.

#### ->allGyms(): array

Returns an array of all gyms available to the member.

#### ->gym($id): Owainjones74\Puregym\Gym

Returns a gym object for the gym with the given id.

### Owainjones74\Puregym\Member

A member object representing the member linked to the email and pin provided when creating the client.

#### Example
```php
$member = $client->member();

echo $member->firstName . ' ' . $member->lastName;
```

#### Methods

##### ->activity(): Owainjones74\Puregym\Activity

Returns an activity object for the member. This is the recent activity for this member.

#### ->homeGym(): Owainjones74\Puregym\Gym

Returns a gym object for the members home gym.

### Owainjones74\Puregym\Gym

A gym object representing a gym.

#### Example
```php
$gym = $client->gym(69);

echo $gym->name;
```

#### Methods

##### ->attendance(): Owainjones74\Puregym\Attendance

Returns an attendance object for the gym. This is the current attendance for this gym, consisting of the number of people in the gym and the capacity of the gym.

### Owainjones74\Puregym\Activity

An activity object representing the recent activity for a member.

#### Example
```php
$activity = $member->activity();

echo $activity->totalVisits;
```

### Owainjones74\Puregym\Attendance

An attendance object representing the current attendance for a gym. Mainly the stats for the current amount of visitors and the capacity of the gym.

#### Example
```php
$attendance = $gym->attendance();

echo $attendance->totalPeopleInGym . '/' . $attendance->maximumCapacity;
```