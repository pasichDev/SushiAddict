# Backend API SushiAddict

This project is an example implementation of a backend API using SlimPHP, a minimalist PHP framework.

## Installation

1. Clone this repository:

```
git clone https://github.com/pasichDev/SushiAddict
```

2. Install dependencies using Composer:

```
composer install
```

3. Configure your web server to point the root directory to `webroot/`.

4. Create a database and configure the connection in the `backend/config/.env` file.

5. Start the web server and verify that the API is accessible.

## Usage

### API Routes

| Method | Route              | Description             |
| ------ | ------------------ | ----------------------- |
| GET    | /api/resource      | Get all resources       |
| GET    | /api/resource/{id} | Get a resource by ID    |
| POST   | /api/resource      | Create a new resource   |
| PUT    | /api/resource/{id} | Update a resource by ID |
| DELETE | /api/resource/{id} | Delete a resource by ID |

### Request Parameters

| Parameter | Type    | Description                  |
| --------- | ------- | ---------------------------- |
| id        | integer | Resource identifier          |
| name      | string  | Resource name                |
| data      | object  | Resource data in JSON format |

### API Errors

| Code | Message          |
| ---- | ---------------- |
| 201  | Invalid API key  |
| 202  | Invalid Action   |
| 203  | Invalid Category |

## Contributing

If you find a bug or have suggestions for improving this project, please create an Issue or submit a Pull Request.

## License

This project is licensed under the MIT License. For more information, please refer to the [LICENSE](LICENSE) file.
