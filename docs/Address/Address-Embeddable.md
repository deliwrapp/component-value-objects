[Address Documentation](../Address.md)

# How to use the Address Embeddable

*NOTE: You can read more about Doctrine's Embeddables here: [Separating Concerns using Embeddables](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/embeddables.html)*

To use the Doctrine's embeddable, you have to follow those steps:

1. Register the embeddable in your Symfony's configuration;
2. Implement the type in your entity.

## STEP 1: Register the embeddable in your Symfony's configuation

Open the file `/config/packages/doctrine.yaml`.

Add the embeddable to the configuration:

```yaml
doctrine:
    ...
    orm:
        ...
        mappings:
            ...
            address:
                is_bundle: false
                type: annotation
                mapping: true
                dir: "%kernel.project_dir%/vendor/deliwrapp/php_value_objects/src/Address"
                prefix: 'Deliwrapp\Component\ValueObjects'
                alias: Address
```

## STEP 2: Implement the Address embeddable in your entity

In your entity:

```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Deliwrapp\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;

/**
 * @ORM\Entity()
 */
class User
{
    ...

    /**
     * @var AddressEmbeddable
     * @ORM\Embedded(class="\Deliwrapp\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable")
     */
    private $address;


}
```