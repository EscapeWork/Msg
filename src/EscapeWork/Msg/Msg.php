<?php namespace EscapeWork\Msg;

class Message
{

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
     * Setando um erro 
     * 
     * @param string $error
     */
    public static function setError( $error )
    {
        static::$errors[] = $error;
    }


    /**
     * Setando uma mensagem 
     * 
     * @param string $error
     */
    public static function setMessage( $message )
    {
        static::$messages[] = $message;
    }


    /**
     * Setando um warning 
     * 
     * @param string $error
     */
    public static function setWarning( $warning )
    {
        static::$warnings[] = $warning;
    }


    /**
     * Setando uma informação  
     * 
     * @param string $error
     */
    public static function setInfo( $info )
    {
        static::$infos[] = $info;
    }


    /**
     * Retornando todos os erros, formatados 
     * 
     * @return string com o HTML formatado
     */
    public static function getErrors()
    {
        if( count( static::$errors ) == 0 )
        {
            return;
        }

        $errors = '<div class="alert alert-error">';
            $errors .= implode('<br />', static::$errors);
        $errors .= '</div>';

        return $errors;
    }


    /**
     * Retornando todos as mensagens, formatados 
     * 
     * @return string com o HTML formatado
     */
    public static function getMessages()
    {
        if( count( static::$messages ) == 0 )
        {
            return;
        }

        $messages = '<div class="alert alert-success">';
            $messages .= implode('<br />', static::$messages);
        $messages .= '</div>';

        return $messages;
    }


    /**
     * Retornando todos os warnings, formatados 
     * 
     * @return string com o HTML formatado
     */
    public static function getWarnings()
    {
        if( count( static::$warnings ) == 0 )
        {
            return;
        }

        $warnings = '<div class="alert">';
            $warnings .= implode('<br />', static::$warnings);
        $warnings .= '</div>';

        return $warnings;
    }


    /**
     * Retornando todos os infos, formatados 
     * 
     * @return string com o HTML formatado
     */
    public static function getInfos()
    {
        if( count( static::$infos ) == 0 )
        {
            return;
        }

        $infos = '<div class="alert alert-info">';
            $infos .= implode('<br />', static::$infos);
        $infos .= '</div>';

        return $infos;
    }


    /**
     * Retornando todas mensagens, erros, warnings e infos
     *
     * @return string 
     */
    public static function getAll()
    {
        self::setSessionAll();

        $all  = static::getMessages();
        $all .= static::getInfos();
        $all .= static::getWarnings();
        $all .= static::getErrors();

        return $all;
    }


    /**
     * Pegando os erros que estão na sessão 
     */
    public static function setSessionErrors()
    {
        $errors = Session::get('errors');

        if( !is_null( $errors ) )
        {
            foreach( $errors as $error )
            {
                self::setError( $error );
            }
        }

        # erro única 
        $error = Session::get('error');
        
        if( !is_null( $error ) )
        {
            self::setError( $error );
        }
    }


    /**
     * Pegando as mensagens que estão na sessão 
     */
    public static function setSessionMessages()
    {
        $messages = Session::get('messages');
        
        if( !is_null( $messages ) )
        {
            foreach( $messages as $message )
            {
                self::setMessage( $message );
            }
        }

        # mensagem única 
        $message = Session::get('message');

        if( !is_null( $message ) )
        {
            self::setMessage( $message );
        }
    }


    /**
     * Pegando as warnings que estão na sessão 
     */
    public static function setSessionWarnings()
    {
        $warnings = Session::get('warnings');
        
        if( !is_null( $warnings ) )
        {
            foreach( $warnings as $warning )
            {
                self::setWarning( $warning );
            }
        }

        # warning única 
        $warning = Session::get('warning');

        if( !is_null( $warning ) )
        {
            self::setWarning( $warning );
        }
    }


    /**
     * Pegando as infos que estão na sessão 
     */
    public static function setSessionInfos()
    {
        $infos = Session::get('infos');
        
        if( !is_null( $infos ) )
        {
            foreach( $infos as $info )
            {
                self::setInfo( $info );
            }
        }

        # info única 
        $info = Session::get('info');

        if( !is_null( $info ) )
        {
            self::setInfo( $info );
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
}