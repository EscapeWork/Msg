# EscapeWork\Msg

Library para fazer controle de mensagens.

### Exemplos 

```php
use EscapeWork\Msg\Msg;

Msg::setInfo('Info.');
Msg::setMessage('O registro foi inserido com sucesso!');
Msg::setWarning('Warning!!');
Msg::setError('Error!!!');
```

### Recebendo os erros 

```php
use EscapeWork\Msg\Msg;

Msg::getErrors();
```

### Recebendo todos os tipos de mensagens 

```php
use EscapeWork\Msg\Msg;

Msg::getAll();
```


### Instalação 

A instalação está disponível via [Composer](https://packagist.org/packages/escapework/msg). Autoload compátivel com a PSR-0.