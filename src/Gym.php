<?php

namespace Owainjones74\Puregym;

class Gym
{
    public int $id;
    public string $name;
    public int $status;
    public array $address;
    public string $phoneNumber;
    public string $emailAddress;
    public array $gymOpeningHours;
    public array $accessOptions;
    public array $location;
    public ?string $reopenDate;

    public ?PureGymClient $client;

    public function __construct(array $data, ?PureGymClient $client = null)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->status = $data['status'];
        $this->address = $data['address'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->emailAddress = $data['emailAddress'];
        $this->gymOpeningHours = $data['gymOpeningHours'];
        $this->accessOptions = $data['accessOptions'];
        $this->location = $data['location'];
        $this->reopenDate = $data['reopenDate'];

        $this->client = $client;
    }

    public function attendance()
    {
        $response = $this->client->curl('https://capi.puregym.com/api/v1/gyms/' . $this->id . '/attendance');

        if (!$response) {
            throw new \Exception('Could not get attendance data');
        }

        return new Attendance($response, $this->client);
    }
}