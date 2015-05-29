# ganalytics-bundle
Google Analytics bundle. See https://github.com/betacie/google-analytics for betacie/google-analytics usages

You need to store all your events before render them.

```php
// You could use tracker service in a controller or inject him in other services
// like a registration listener
$this->container->get('betacie_google.event_tracker')->trackEvent([
    'category' => 'Registration',
    'action' => 'Confirmed',
    'label' => 'user-1',
]);
```

Once you have stored all the events, the tracking code will be displayed with a Twig function.

```
// Twig template
{{ google_track() }}
```
