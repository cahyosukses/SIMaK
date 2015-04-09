<?php
class mUser extends CActiveRecord
{
	public function tableName()
	{
		return 'm_user';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name, username, password, salt, default_group', 'required'),
			array('default_group, status_id, superuser, created_date, last_login', 'numerical', 'integerOnly'=>true),
			array('full_name', 'length', 'max'=>50),
			array('username', 'length', 'max'=>25),
			array('password', 'length', 'max'=>200),
			array('salt, photo_path', 'length', 'max'=>100),
			array('created_by, hash_type', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, full_name, username, password, salt, default_group, status_id, superuser, photo_path, created_date, created_by, last_login, hash_type', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'full_name' => 'Full Name',
			'username' => 'Username',
			'password' => 'Password',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function validatePassword($password)
    {
        if ($this->hash_type == "md5") {
            $check = $this->hashPassword($password, $this->salt) === $this->password;

            if ($check) {
                $_mysalt = self::blowfishSalt();
                $_password = crypt($password, $_mysalt);
                self::model()->updateByPk($this->id, ['password' => $_password, 'salt' => $_mysalt, 'hash_type' => 'crypt']);
            }
        } else
            $check = $this->password === crypt($password, $this->password);

        return $check;
    }
	
	public static function blowfishSalt($cost = 13)
    {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new Exception("cost parameter must be between 4 and 31");
        }
        $rand = [];
        for ($i = 0; $i < 8; $i += 1) {
            $rand[] = pack('S', mt_rand(0, 0xffff));
        }
        $rand[] = substr(microtime(), 2, 6);
        $rand = sha1(implode('', $rand), true);
        $salt = '$2a$' . sprintf('%02d', $cost) . '$';
        $salt .= strtr(substr(base64_encode($rand), 0, 22), ['+' => '.']);
        return $salt;
    }
}
