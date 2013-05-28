<?php namespace EscapeWork\Msg;

class Msg
{

    /**
     * Session Handler
     */
    protected static $sessionHandler;

    /**
     * Errors 
     * 
     * @var array
     */
    public static $errors = array();

    /**
     * Success messages 
     * 
     * @var array
     */
    public static $messages = array();

    /**
     * Warnings
     * 
     * @var array
     */
    public static $warnings = array();

    /**
     * Infos
     * 
     * @var array
     */
    public static $infos = array();

    /**
     * Setting the driver
     *
     * @param  mixed Driver
     */
    public static function setSessionHandler($sessionHandler)
    {
        static::$sessionHandler = $sessionHandler;
    }

    /**
     * Setando um erro 
     * 
     * @param string $error
     */
    public static function setError($error)
    {
        static::$errors[] = static::get($error);
    }

    /**
     * Setando uma mensagem 
     * 
     * @param string $error
     */
    public static function setMessage($message)
    {
        static::$messages[] = static::get($message);
    }

    /**
     * Setando um warning 
     * 
     * @param string $error
     */
    public static function setWarning($warning)
    {
        static::$warnings[] = static::get($warning);
    }

    /**
     * Setando uma informação  
     * 
     * @param string $error
     */
    public static function setInfo($info)
    {
        static::$infos[] = static::get($info);
    }

    public static function get($txt)
    {
        if (! is_array($txt)) {
            return $txt;
        }

        $html = '';
        foreach ($txt as $text) {
            $html .= implode('<br />', is_array($text) ? $text : array($text));
        }

        return $html;
    }

    /**
     * Formatando com suas devidas opções 
     *
     * @access  private
     * @param   array   $msgs 
     * @param   boolean $html
     */
    private static function format(array $msgs, $html = true, $class = '')
    {
        if ($html === true) {
            $messages = '<div class="alert '.$class.'">';
                $messages .= implode('<br />', $msgs);
            $messages .= '</div>';
        } else {
            $messages = implode('<br />', $msgs);
        }

        return $messages;
    }

    /**
     * Retornando todos os erros, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string com o HTML formatado
     */
    public static function getErrors($html = true)
    {
        if (count(static::$errors) == 0) {
            return;
        }

        return static::format(static::$errors, $html, 'alert-error');
    }

    /**
     * Retornando todos as mensagens, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string        com as mensagens 
     */
    public static function getMessages($html = true)
    {
        if (count(static::$messages) == 0) {
            return;
        }

        return static::format(static::$messages, $html, 'alert-success');
    }

    /**
     * Retornando todos os warnings, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string com o HTML formatado
     */
    public static function getWarnings($html = true)
    {
        if (count(static::$warnings) == 0) {
            return;
        }

        return static::format(static::$warnings, $html);
    }

    /**
     * Retornando todos os infos, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string com o HTML formatado
     */
    public static function getInfos($html = true)
    {
        if (count(static::$infos) == 0) {
            return;
        }

        return static::format(static::$infos, $html, 'alert-info');
    }

    /**
     * Retornando todas mensagens, erros, warnings e infos
     *
     * @param  boolean $withSessionMessages [Se deseja pegar as mensagens da sessão]
     * @return string  
     */
    public static function getAll($html = true, $withSessionMessages = true)
    {
        if ($withSessionMessages === true) {
            self::setSessionAll();
        }

        $all  = static::getMessages($html);
        $all .= static::getInfos($html);
        $all .= static::getWarnings($html);
        $all .= static::getErrors($html);

        return $all;
    }

    /**
     * Pegando os erros que estão na sessão 
     */
    public static function setSessionErrors()
    {
        $errors = static::$sessionHandler->get('errors');

        if (! is_null($errors) && (is_array($errors) || is_object($errors))) {
            foreach ($errors as $error) {
                self::setError($error);
            }
        }
        
        if (! is_null($error = static::$sessionHandler->get('error'))) {
            self::setError($error);
        }
    }

    /**
     * Pegando as mensagens que estão na sessão 
     */
    public static function setSessionMessages()
    {
        $messages = static::$sessionHandler->get('messages');
        
        if (! is_null($messages) && (is_array($messages) || is_object($messages))) {
            foreach ($messages as $message) {
                self::setMessage($message);
            }
        }

        if (! is_null($message = static::$sessionHandler->get('message'))) {
            self::setMessage($message);
        }
    }

    /**
     * Pegando as warnings que estão na sessão 
     */
    public static function setSessionWarnings()
    {
        $warnings = static::$sessionHandler->get('warnings');
        
        if (! is_null($warnings) && (is_array($warnings) || is_object($warnings))) {
            foreach ($warnings as $warning) {
                self::setWarning($warning);
            }
        }

        if (! is_null($warning = static::$sessionHandler->get('warning'))) {
            self::setWarning($warning);
        }
    }

    /**
     * Pegando as infos que estão na sessão 
     */
    public static function setSessionInfos()
    {
        $infos = static::$sessionHandler->get('infos');
        
        if (! is_null($infos) && (is_array($infos) || is_object($infos))) {
            foreach ($infos as $info) {
                self::setInfo($info);
            }
        }

        if (! is_null($info = static::$sessionHandler->get('info'))) {
            self::setInfo($info);
        }
    }

    /**
     * Setando todos os tipos de mensagens na sessão 
     */
    public static function setSessionAll()
    {
        self::setSessionErrors();
        self::setSessionMessages();
        self::setSessionWarnings();
        self::setSessionInfos();
    }

    /**
     * Limpando todas as mensagens, erros, warnings e infos 
     *
     * @return  void 
     */
    public static function clearAll()
    {
        self::clearMessages();
        self::clearErrors();
        self::clearWarnings();
        self::clearInfos();
    }

    public static function clearMessages()
    {
        static::$messages = array();
    }

    public static function clearErrors()
    {
        static::$errors = array();
    }

    public static function clearWarnings()
    {
        static::$warnings = array();
    }

    public static function clearInfos()
    {
        static::$infos = array();
    }
}