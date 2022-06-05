## Updated files

- app/Http/Controllers/*
- config/jobs.php
- routes/api.php
- app/Library/*
- app/Models/*
- database/factories/*
- database/migrations/*
- database/seeders/*

## Info

- ignored authentications for api calls
- versioning ignored
- models & error handling are kept simple
- Used laravel 9 hence php 8.1 required
- State pattern is applied to have single point for handling different states during the lifetime of a job opening.
  Example:
```php
// app/Library/JobPosting/States/Posted.php
public function handleAcceptRequest()
{
    $context = $this->getContext();

    if (!$context->getData()->has('provider_id')) {
        throw new Exception('No provider id provided.');
    }

    // Ensure that provider we can only update the status
    // and no other fields of a job post
    $context->setData($context->getData()->only(['provider_id', 'status']));

    $context->setState(new RequestAccepted($context));
}
```
- Business logic kept simple
- A state can be updated through jobs/update a job in the collection.
- Custimization and enumaration of states can be found at  
`config/jobs.php`
- To update the status of a job as Provider, you need to specify `issuer`, 1 is provider 2 is client.
```json
{
    "title": "test",
    "description": "test desc updated new",
    "status": 6,
    "issuer": 1
}
```

### Running

- `php composer install`
- `php artisan serve`

