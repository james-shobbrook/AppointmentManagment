### Appointment Booking API

This API provides functionality for booking appointments between customers and appointment types.

#### Requirements
- PHP 7.4 or higher
- Composer
- Docker (optional)

#### Installation
1. Clone this repository.
2. Run `composer install` to install dependencies.
3. Copy `.env.example` to `.env` and configure the database settings.
4. Run database migrations with `php artisan migrate`.
5. (Optional) If you have Docker installed, you can run `./vendor/bin/sail up` to run the project in a container.

#### Usage
##### API Endpoints
This API exposes the following endpoints:
- `GET /api/v1/appointments`: Get a list of all appointments.
- `POST /api/v1/appointments`: Create a new appointment.
- `GET /api/v1/customers`: Get a list of all customers.
- `GET /api/v1/customers/{id}/appointments`: Get a list of appointments for a specific customer.

##### OpenAPI Specs
The OpenAPI 3 specs for this API are included in the project root 'openapi-spec.yaml'

#### License
This project is licensed under the MIT license.
