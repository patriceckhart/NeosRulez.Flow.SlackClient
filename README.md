# Slack client package for Neos and Flow

## Installation

The NeosRulez.Flow.SlackClient package is listed on packagist (https://packagist.org/packages/neosrulez/flow-slackclient) - therefore you don't have to include the package in your "repositories" entry any more.

Just run:

```
composer require neosrulez/flow-slackclient
```

## Configuration

```yaml
NeosRulez:
  Flow:
    SlackClient:
      webhookUrl: 'https://hooks.slack.com/services/X02KD054T/C02MFB2MY14/xxXH5Bz0uaV5xqdW4s025F5i'
```

## Usage

```php
<?php
namespace Acme\Package\Controller;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

use NeosRulez\Flow\SlackClient\Service\SlackService;

class AcmeController extends ActionController
{

    /**
     * @Flow\Inject
     * @var SlackService
     */
    protected $slackService;

    /**
     * @return bool
     */
    public function indexAction():bool
    {
        return $this->slackService->send('Your message to your Slack App');
    }

}
```

## Author

* E-Mail: mail@patriceckhart.com
* URL: http://www.patriceckhart.com
