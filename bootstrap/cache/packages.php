<?php return array (
  'intervention/image' => 
  array (
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
  ),
  'laravel/mcp' => 
  array (
    'aliases' => 
    array (
      'Mcp' => 'Laravel\\Mcp\\Server\\Facades\\Mcp',
    ),
    'providers' => 
    array (
      0 => 'Laravel\\Mcp\\Server\\McpServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/socialite' => 
  array (
    'aliases' => 
    array (
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
    'providers' => 
    array (
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'prism-php/prism' => 
  array (
    'aliases' => 
    array (
      'PrismServer' => 'Prism\\Prism\\Facades\\PrismServer',
    ),
    'providers' => 
    array (
      0 => 'Prism\\Prism\\PrismServiceProvider',
    ),
  ),
  'sentry/sentry-laravel' => 
  array (
    'aliases' => 
    array (
      'Sentry' => 'Sentry\\Laravel\\Facade',
    ),
    'providers' => 
    array (
      0 => 'Sentry\\Laravel\\ServiceProvider',
      1 => 'Sentry\\Laravel\\Tracing\\ServiceProvider',
    ),
  ),
  'socialiteproviders/manager' => 
  array (
    'providers' => 
    array (
      0 => 'SocialiteProviders\\Manager\\ServiceProvider',
    ),
  ),
  'vedmant/laravel-feed-reader' => 
  array (
    'aliases' => 
    array (
      'FeedReader' => 'Vedmant\\FeedReader\\Facades\\FeedReader',
    ),
    'providers' => 
    array (
      0 => 'Vedmant\\FeedReader\\FeedReaderServiceProvider',
    ),
  ),
);