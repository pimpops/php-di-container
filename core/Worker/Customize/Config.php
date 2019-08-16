<?php

namespace Core\Worker\Customize;

class Config {
    protected $config = [
        'dashboardMenu' => [
            'home' => [
                'classIcon' => 'icon-speedometer icons',
                'urlPath'   => '/admin/',
                'title'     => 'Home'
            ],
            'pages' => [
                'classIcon' => 'icon-doc icons',
                'urlPath'   => '/admin/pages/',
                'title'     => 'Pages'
            ],
            'posts' => [
                'classIcon' => 'icon-pencil icons',
                'urlPath'   => '/admin/posts/',
                'title'     => 'Posts'
            ],
            'settings' => [
                'classIcon' => 'icon-equalizer icons',
                'urlPath'   => '/admin/settings/general/',
                'title'     => 'Settings'
            ]
        ]
    ];
    
    public function has($key) {
        return isset($this->config[$key]);
    }
    
    public function get($key) {
        return $this->has($key) ? $this->config[$key] : null;
    }
    
    public function set($key, $value) {
        $this->config[$key] = $value;
    }
}