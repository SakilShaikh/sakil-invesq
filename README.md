# Ecommerce Backend

This is a simple e-commerce backend built with Laravel. It provides basic API endpoints for user authentication, product management, and order processing.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

*   PHP >= 8.2
*   Composer
*   NPM

### Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/your-username/your-repository.git
    cd your-repository
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install NPM dependencies**
    ```bash
    npm install
    ```

4.  **Create a copy of the .env file**
    ```bash
    cp .env.example .env
    ```

5.  **Generate an application key**
    ```bash
    php artisan key:generate
    ```

6.  **Run the database migrations**
    ```bash
    php artisan migrate
    ```

7.  **Seed the database with initial data (optional)**
    ```bash
    php artisan db:seed
    ```

## Running the Application

To start the development server, run the following command:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

## API Endpoints

The following are the available API endpoints.

### Authentication

Authentication is handled using Laravel Sanctum. To access protected routes, you need to obtain a bearer token by registering or logging in.

#### 1. Register

*   **URL:** `/api/register`
*   **Method:** `POST`
*   **Body:**
    ```json
    {
      "name": "Your Name",
      "email": "user@example.com",
      "password": "password",
      "password_confirmation": "password"
    }
    ```
*   **Response:**
    ```json
    {
        "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    }
    ```

#### 2. Login

*   **URL:** `/api/login`
*   **Method:** `POST`
*   **Body:**
    ```json
    {
      "email": "user@example.com",
      "password": "password"
    }
    ```
*   **Response:**
    ```json
    {
        "token": "2|xxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    }
    ```

### Products

#### 1. Add a Product

*   **URL:** `/api/products`
*   **Method:** `POST`
*   **Headers:**
    *   `Authorization: Bearer <your-token>`
*   **Body:**
    ```json
    {
      "name": "Laptop",
      "price": 999.99,
      "stock": 10
    }
    ```

### Orders

#### 1. Place an Order

*   **URL:** `/api/orders`
*   **Method:** `POST`
*   **Headers:**
    *   `Authorization: Bearer <your-token>`
*   **Body:**
    ```json
    {
      "items": [
        {
          "product_id": 1,
          "quantity": 2
        }
      ]
    }
    ```

#### 2. Get Orders

*   **URL:** `/api/orders`
*   **Method:** `GET`
*   **Headers:**
    *   `Authorization: Bearer <your-token>`

## Testing

To run the test suite, use the following command:

```bash
php artisan test
```

## Built With

*   [Laravel](https://laravel.com/) - The web framework used
*   [Laravel Sanctum](https://laravel.com/docs/sanctum) - For authentication
