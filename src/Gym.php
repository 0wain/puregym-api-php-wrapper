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
    public array $openingHours;
    public array $accessOptions;
    public array $location;
    public ?string $reopenDate;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->status = $data['status'];
        $this->address = $data['address'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->emailAddress = $data['emailAddress'];
        $this->openingHours = $data['gymOpeningHours'];
        $this->accessOptions = $data['accessOptions'];
        $this->location = $data['location'];
        $this->reopenDate = $data['reopenDate'];
    }
}