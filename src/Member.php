<?php

namespace Owainjones74\Puregym;

class Member
{
    public int $id;
    public string $compoundMemberId;
    public string $firstName;
    public string $lastName;
    public int $homeGymId;
    public string $homeGymName;
    public string $emailAddress;
    public string $gymAccessPin;
    public string $dateofBirth;
    public string $mobileNumber;
    public string $postCode;
    public string $membershipName;
    public string $membershipLevel;
    public string $suspendedReason;
    public string $memberStatus;

    public ?PureGymClient $client;

    public function __construct(array $data, ?PureGymClient $client = null)
    {
        $this->id = $data['id'];
        $this->compoundMemberId = $data['compoundMemberId'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->homeGymId = $data['homeGymId'];
        $this->homeGymName = $data['homeGymName'];
        $this->emailAddress = $data['emailAddress'];
        $this->gymAccessPin = $data['gymAccessPin'];
        $this->dateofBirth = $data['dateofBirth'];
        $this->mobileNumber = $data['mobileNumber'];
        $this->postCode = $data['postCode'];
        $this->membershipName = $data['membershipName'];
        $this->membershipLevel = $data['membershipLevel'];
        $this->suspendedReason = $data['suspendedReason'];
        $this->memberStatus = $data['memberStatus'];

        $this->client = $client;
    }

    public function activity()
    {
        $response = $this->client->curl('https://capi.puregym.com/api/v1/member/activity');

        if (!$response) {
            throw new \Exception('Could not get activity data');
        }

        return new Activity($response, $this->client);
    }

    public function homeGym()
    {
        return $this->client->gym($this->homeGymId);
    }
}