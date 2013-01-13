<?php namespace EscapeWork\Msg;

class Msg
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
     * Formatando com suas devidas opções 
     *
     * @access  private
     * @param   array   $msgs 
     * @param   boolean $html
     */
    private static function format( array $msgs, $html = true )
    {
        if( $html === true )
        {
            $messages = '<div class="alert alert-success">';
                $messages .= implode('<br />', $msgs);
            $messages .= '</div>';
        }
        else
        {
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
    public static function getErrors( $html = true )
    {
        if( count( static::$errors ) == 0 )
        {
            return;
        }

        return static::format( static::$errors, $html );
    }


    /**
     * Retornando todos as mensagens, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string        com as mensagens 
     */
    public static function getMessages( $html = true )
    {
        if( count( static::$messages ) == 0 )
        {
            return;
        }

        return static::format( static::$messages, $html );
    }


    /**
     * Retornando todos os warnings, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string com o HTML formatado
     */
    public static function getWarnings( $html = true )
    {
        if( count( static::$warnings ) == 0 )
        {
            return;
        }

        return static::format( static::$warnings, $html );
    }


    /**
     * Retornando todos os infos, formatados 
     *
     * @param  boolean $html se deseja com as tags HTML
     * @return string com o HTML formatado
     */
    public static function getInfos( $html = true )
    {
        if( count( static::$infos ) == 0 )
        {
            return;
        }

        return static::format( static::$infos, $html );
    }


    /**
     * Retornando todas mensagens, erros, warnings e infos
     *
     * @param  boolean $withSessionMessages [Se deseja pegar as mensagens da sessão]
     * @return string  
     */
    public static function getAll( $html = true, $withSessionMessages = true )
    {
        if( $withSessionMessages === true )
        {
            self::setSessionAll();
        }

        $all  = static::getMessages( $html );
        $all .= static::getInfos( $html );
        $all .= static::getWarnings( $html );
        $all .= static::getErrors( $html );

        return $all;
    }


    /**
     * Pegando os erros que estão na sessão 
     */
    public static function setSessionErrors()
    {
        $errors = isset( $_SESSION['errors'] ) ? $_SESSION['errors'] : null;

        if( !is_null( $errors ) && is_array( $errors ) )
        {
            foreach( $errors as $error )
            {
                self::setError( $error );
            }
        }

        # erro única 
        $error = isset( $_SESSION['error'] ) ? $_SESSION['error'] : null;
        
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
        $messages = isset( $_SESSION['messages'] ) ? $_SESSION['messages'] : null;
        
        if( !is_null( $messages ) && is_array( $messages ) )
        {
            foreach( $messages as $message )
            {
                self::setMessage( $message );
            }
        }

        # mensagem única 
        $message = isset( $_SESSION['message'] ) ? $_SESSION['message'] : null;

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
        $warnings = isset( $_SESSION['warnings'] ) ? $_SESSION['warnings'] : null;
        
        if( !is_null( $warnings ) && is_array( $warnings ) )
        {
            foreach( $warnings as $warning )
            {
                self::setWarning( $warning );
            }
        }

        # warning única 
        $warning = isset( $_SESSION['warning'] ) ? $_SESSION['warning'] : null;

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
        $infos = isset( $_SESSION['infos'] ) ? $_SESSION['infos'] : null;
        
        if( !is_null( $infos ) && is_array( $infos ) )
        {
            foreach( $infos as $info )
            {
                self::setInfo( $info );
            }
        }

        # info única 
        $info = isset( $_SESSION['info'] ) ? $_SESSION['info'] : null;

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