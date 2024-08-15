# CupCakePHP

Welcome to **CupCakePHP**! 🧁

CupCakePHP is a lightweight mini-framework based on the MVC (Model-View-Controller) architecture. It simplifies web development with its clean and efficient structure, perfect for small to medium-sized projects.

## Features

- **MVC Architecture**: Organized and maintainable code.
- **Easy to Use**: Simple setup and intuitive structure.
- **User authentication**: Simple authentication.

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/ahozein/CupcakePHP.git
    ```
2. **Navigate to the project directory**:
    ```bash
    cd CupcakePHP
    ```
3. **Start the development server**:
    ```bash
    php -S localhost:8000
    ```

## Usage

CupCakePHP follows the MVC pattern. Organize your code into Models, Views, and Controllers.

### Example Model

```php
<?php

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->fetch();

        // Check email exist
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
```

## Contributing

I’d love to have you contribute to CupCakePHP! If you have ideas, improvements, or bug fixes, feel free to fork the repository and submit a pull request. For major changes, please open an issue first so we can discuss what you’d like to change. Let’s make CupCakePHP even better together!🤓 
