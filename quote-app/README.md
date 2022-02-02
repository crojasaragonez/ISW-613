## Local setup for development with Docker

```bash
  install Docker in your OS
  git clone git@github.com:crojasaragonez/ISW-613.git
  cd ISW-613/quote-app
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
  cp .env.example .env
  alias sail='bash vendor/bin/sail'
  sail up
```

## Contribute


1. Pull the most recent changes in main branch.
1. create a new branch with a descriptive name.
1. work on the feature/bugs until the work is done.
1. create a pull request and ask the professor to review it.
