# Project-CRM

# Get project on git
In the the terminal do: git clone https://github.com/deveBrice/project-crm.git

# Install dependencies
Run docker and do the commands:
- docker-compose up -d
- docker-compose exec web composer install

# Access to the app and database of project
In url of navigateur:
- App: localhost:80
- Database: localhost:3001

# Run all tests with phpunits
- docker-compose exec web php bin/phpunit
- folder test unitaire: /tests/util
- folder test integration: /tests