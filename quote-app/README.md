## Local setup for development with Docker

```bash
  install Docker in your OS
  git clone git@github.com:crojasaragonez/ISW-613.git
  git clone https://github.com/crojasaragonez/ISW-613
  cd ISW-613/quote-app
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
  cp .env.example .env
  alias sail='bash vendor/bin/sail'
  sail npm run dev
  sail up
```

## Contribute


1. Pull the most recent changes in main branch.
1. create a new branch with a descriptive name.
1. work on the feature/bugs until the work is done.
1. create a pull request and ask the professor to review it.


## Sweet Alerts

Si se crea un controlador nuevo para que las alertas funcionen deben de importar la siguiente linea:

1.  use RealRashid\SweetAlert\Facades\Alert;

Estos son los ejemplos de las alertas que podemos usar.

Mediante helper function:

alert('Title','Lorem Lorem Lorem', 'success');

alert()->success('Title','Lorem Lorem Lorem');

alert()->info('Title','Lorem Lorem Lorem');

alert()->warning('Title','Lorem Lorem Lorem');

alert()->error('Title','Lorem Lorem Lorem');

alert()->question('Title','Lorem Lorem Lorem');

alert()->image('Image Title!','Image Description','Image URL','Image Width','Image Height');

alert()->html('<i>HTML</i> <u>example</u>'," You can use <b>bold text</b>, <a href='//github.com'>links</a> and other HTML tags ",'success');

## Other Sweetalert Uses

Alert::info('Info Title', 'Info Message');

Alert::warning('Warning Title', 'Warning Message');

Alert::error('Error Title', 'Error Message');

Alert::question('Question Title', 'Question Message');

Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height');

Alert::html('Html Title', 'Html Code', 'Type');

## Sweet Toas
toast('Your Post as been submited!','success');