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

| Method | Route                                                                 | Description                           |
| ------ | --------------------------------------------------------------------- | ------------------------------------- |
| GET    | /api_public/category/key_api={api_token_public}&action={action}       | Get all categories                    |
| GET    | /api_public/products/key_api={api_token_public}&action={action}&q={q} | Get products in the selected category |

### Request Parameters

| Parameter        | Type   | Description                                     |
| ---------------- | ------ | ----------------------------------------------- |
| api_token_public | string | API access token for clients (web, mobile app)  |
| action           | string | Key actions                                     |
| q                | int    | An additional parameter required by the request |

### Actions Category

| Actions | Description        |
| ------- | ------------------ |
| getAll  | Get all categories |

### Actions Products

| Actions                | Description                           |
| ---------------------- | ------------------------------------- |
| getProductFromCategory | Get products in the selected category |

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
