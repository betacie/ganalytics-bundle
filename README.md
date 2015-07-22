# ganalytics-bundle

Google Analytics bundle. See https://github.com/betacie/google-analytics for betacie/google-analytics if you need the standalone libraby or want to check its API.

## Setup

```
composer require betacie/ganalytics-bundle
```

Add the bundle in your `AppKernel.php` file:

```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new Betacie\Bundle\GoogleBundle\BetacieGoogleBundle(),
        ];
    }
}
```

Set your `app/config/config.yml` with:

```yaml
betacie_google:
    storage: session
```

## Usage

You need to store all your events before rendering them.

```php
// You could use the tracker service in a controller or inject it in other services
// like a registration listener
$this->container->get('betacie_google.event_tracker')->trackEvent([
    'category' => 'Registration',
    'action' => 'Confirmed',
    'label' => 'user-1',
]);
```

Once you have stored all the events, the tracking code can be displayed with a Twig function.

```
// Twig template
{{ google_track() }}
```
