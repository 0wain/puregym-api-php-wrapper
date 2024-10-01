<?php

namespace Owainjones74\Puregym;

class PureGymClient
{
    public string $username;
    public string $password;

    public string $access_token = '';

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;

        $this->access_token = $this->createToken();
    }

    private function createToken(): string
    {
        $response = $this->curl('https://auth.puregym.com/connect/token', 'POST', [
            'username' => $this->username,
            'password' => $this->password,
            'grant_type' => 'password',
            'client_id' => 'ro.client',
            'scope' => 'pgcapi'
        ]);

        if (!$response['access_token']) {
            throw new \Exception('Could not get access token');
        }

        return $response['access_token'];
    }

    public function allGyms()
    {
        $response = $this->curl('https://capi.puregym.com/api/v1/gyms/');

        $gyms = [];
        foreach ($response as $gym) {
            $gyms[] = new Gym($gym, $this);
        }

        return $gyms;
    }

    private function curl($url, $method = 'GET', $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);

            $encodedData = '';
            foreach ($data as $key => $value) {
                $encodedData .= $key . '=' . $value . '&';
            }

            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'User-Agent: PureGym/1523 CFNetwork/1312 Darwin/21.0.0',
            'Authorization: Bearer ' . $this->access_token
        ]);
        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output, true);
    }
}