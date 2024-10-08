<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class DashboardController extends Controller
{
    public function index()
    {
        $profileData = $this->getGithubProfile(Auth::user()->token);

        return view('admin.index', compact('profileData'));
    }



    private function getGithubProfile($token)
    {
        $client = new Client();
        
        // Get user profile
        $response = $client->get('https://api.github.com/user', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/vnd.github.v3+json',
            ],
        ]);
        
        $profile = json_decode($response->getBody(), true);

        $response = $client->get('https://api.github.com/user/repos', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/vnd.github.v3+json',
            ],
            'query' => [
                'visibility' => 'public',
                'sort'       => 'updated',
                'direction'  => 'desc',
            ] 
        ]);
        
        $repositories = json_decode($response->getBody(), true);
        
        return [
            'username' => $profile['login'],
            'name' => $profile['name'],
            'url' => $profile['url'],
            'profile_picture' => $profile['avatar_url'],
            'bio' => $profile['bio'],
            'public_repos' => $profile['public_repos'],
            'repositories' => array_map(function ($repo) {
                return [
                    'name' => $repo['name'],
                    'description' => $repo['description'],
                    'stars' => $repo['stargazers_count'],
                    'forks' => $repo['forks_count'],
                    'language' => $repo['language'],
                    'url'      => $repo['html_url'],
                ];
            }, $repositories),
        ];
    }
}
