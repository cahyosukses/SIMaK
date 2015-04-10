<?php
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$user = mUser::model()->find('status_id = 1 and LOWER(username)=?', array(strtolower($this->username)));
		
		if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($user->status_id != 1)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
			$this->setState('fullName', $user->full_name);
			$this->setState('shortName', $user->short_name);
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
	}
	
    public function getId()
    {
        return $this->_id;
    }
}