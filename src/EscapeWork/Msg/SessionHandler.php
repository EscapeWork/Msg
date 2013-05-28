<?php namespace EscapeWork\Msg;

class SessionHandler
{

    /**
     * Session
     * 
     * @var array
     */
    protected $session;
    
    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * Returning if the session has a certain value
     */
    public function has($key)
    {
        return isset($this->session[$key]);
    }

    /**
     * Returning a specific value
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->session[$key];
        }

        return null;
    }
}